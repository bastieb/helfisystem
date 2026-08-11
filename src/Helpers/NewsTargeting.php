<?php

declare(strict_types=1);

namespace Engelsystem\Helpers;

use Engelsystem\Models\AngelType;
use Engelsystem\Models\Location;
use Engelsystem\Models\News;
use Engelsystem\Models\Shifts\ShiftEntry;
use Engelsystem\Models\Shifts\ShiftType;
use Engelsystem\Models\User\User;

/**
 * helfisystem: Zielgruppen-Filter für News.
 *
 * Filter-Struktur (JSON in news.target_filter), alle Dimensionen optional:
 *   [
 *     'mode'        => 'all' | 'any',   // UND / ODER über die Dimensionen
 *     'angel_types' => [int,...],       // User ist in einem dieser Engeltypen
 *     'shift_types' => [int,...],       // User hat eine Schicht dieses Schichttyps
 *     'locations'   => [int,...],       // User hat eine Schicht an diesem Ort
 *     'days'        => ['Y-m-d',...],   // User hat an diesem Tag eine Schicht
 *     'status'      => [string,...],    // paid|not_paid|arrived|active|shift_completed
 *   ]
 * Leerer/leer-dimensionierter Filter = an alle.
 */
class NewsTargeting
{
    public const STATUS_KEYS = [
        'paid',
        'not_paid',
        'arrived',
        'active',
        'all_shifts_completed',
    ];

    /**
     * Auswahlmöglichkeiten für das Bearbeitungsformular.
     *
     * @return array{angel_types: array, shift_types: array, locations: array, days: array, status: array}
     */
    public static function formOptions(): array
    {
        $days = ShiftEntry::query()
            ->join('shifts', 'shifts.id', '=', 'shift_entries.shift_id')
            ->selectRaw('DATE(shifts.start) AS d')
            ->distinct()
            ->orderBy('d')
            ->pluck('d')
            ->all();

        // Falls noch keine Schichten existieren: aus allen Schichten ableiten
        if (empty($days)) {
            $days = \Engelsystem\Models\Shifts\Shift::query()
                ->selectRaw('DATE(start) AS d')
                ->distinct()
                ->orderBy('d')
                ->pluck('d')
                ->all();
        }

        return [
            'angel_types' => AngelType::orderBy('name')->get(['id', 'name']),
            'shift_types' => ShiftType::orderBy('name')->get(['id', 'name']),
            'locations'   => Location::orderBy('name')->get(['id', 'name']),
            'days'        => $days,
            'status'      => self::STATUS_KEYS,
        ];
    }

    /**
     * Filter aus dem Request bauen (oder null, wenn keine Dimension gewählt = an alle).
     *
     * @param array<string, mixed> $input
     */
    public static function fromRequest(array $input): ?array
    {
        $ints = fn($k) => array_values(array_filter(array_map(
            'intval',
            (array) ($input[$k] ?? [])
        )));
        $strs = fn($k) => array_values(array_filter(array_map(
            'strval',
            (array) ($input[$k] ?? [])
        )));

        $filter = [
            'mode'        => ($input['target_mode'] ?? 'all') === 'any' ? 'any' : 'all',
            'angel_types' => $ints('target_angel_types'),
            'shift_types' => $ints('target_shift_types'),
            'locations'   => $ints('target_locations'),
            'days'        => $strs('target_days'),
            'status'      => array_values(array_intersect($strs('target_status'), self::STATUS_KEYS)),
        ];

        if (
            empty($filter['angel_types']) && empty($filter['shift_types'])
            && empty($filter['locations']) && empty($filter['days']) && empty($filter['status'])
        ) {
            return null; // keine Einschränkung -> an alle
        }

        return $filter;
    }

    /**
     * Trifft die News auf den User zu?
     */
    public static function matchesUser(News $news, User $user): bool
    {
        $filter = $news->target_filter;
        if (empty($filter) || !is_array($filter)) {
            return true;
        }

        $results = [];

        if (!empty($filter['angel_types'])) {
            $results[] = $user->userAngelTypes()
                ->whereIn('angel_types.id', $filter['angel_types'])
                ->exists();
        }
        if (!empty($filter['shift_types'])) {
            $results[] = self::userShiftQuery($user)
                ->whereIn('shifts.shift_type_id', $filter['shift_types'])->exists();
        }
        if (!empty($filter['locations'])) {
            $results[] = self::userShiftQuery($user)
                ->whereIn('shifts.location_id', $filter['locations'])->exists();
        }
        if (!empty($filter['days'])) {
            $placeholders = implode(',', array_fill(0, count($filter['days']), '?'));
            $results[] = self::userShiftQuery($user)
                ->whereRaw("DATE(shifts.start) IN ($placeholders)", array_values($filter['days']))
                ->exists();
        }
        if (!empty($filter['status'])) {
            $results[] = self::matchesAnyStatus($user, $filter['status']);
        }

        if (empty($results)) {
            return true;
        }

        $mode = ($filter['mode'] ?? 'all') === 'any' ? 'any' : 'all';
        return $mode === 'any'
            ? in_array(true, $results, true)
            : !in_array(false, $results, true);
    }

    /**
     * Filtert eine Sammlung von News auf die für den User sichtbaren.
     *
     * @param iterable<News> $newsList
     * @return News[]
     */
    public static function filterForUser(iterable $newsList, User $user): array
    {
        $out = [];
        foreach ($newsList as $news) {
            if (self::matchesUser($news, $user)) {
                $out[] = $news;
            }
        }
        return $out;
    }

    private static function userShiftQuery(User $user)
    {
        return ShiftEntry::query()
            ->join('shifts', 'shifts.id', '=', 'shift_entries.shift_id')
            ->where('shift_entries.user_id', $user->id);
    }

    /**
     * @param string[] $statuses
     */
    private static function matchesAnyStatus(User $user, array $statuses): bool
    {
        foreach ($statuses as $status) {
            if (self::matchesStatus($user, $status)) {
                return true;
            }
        }
        return false;
    }

    private static function matchesStatus(User $user, string $status): bool
    {
        switch ($status) {
            case 'paid':
                return (bool) $user->personalData->has_payday;
            case 'not_paid':
                return !$user->personalData->has_payday;
            case 'arrived':
                return (bool) $user->state->arrived;
            case 'active':
                return (bool) $user->state->active;
            case 'all_shifts_completed':
                return self::allShiftsCompleted($user);
        }
        return false;
    }

    private static function allShiftsCompleted(User $user): bool
    {
        $row = ShiftEntry::query()
            ->where('user_id', $user->id)
            ->selectRaw('COUNT(*) AS c, COALESCE(SUM(shift_completed),0) AS done')
            ->first();
        return $row && $row->c > 0 && (int) $row->c === (int) $row->done;
    }
}
