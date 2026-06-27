<?php

use Engelsystem\Models\Shifts\Shift;

/**
 * helfisystem: Tageweise Freischaltung der Schicht-Selbstanmeldung.
 * Setzt/entfernt shifts.signup_starts_at für alle Schichten eines Tages.
 */

function shift_release_title(): string
{
    return __('shift_release.title');
}

function shift_release_controller(): array
{
    if (!auth()->can('user_shifts_admin')) {
        throw_redirect(url('/'));
    }

    $request = request();

    if ($request->hasPostData('submit')) {
        $day = (string) $request->postData('day');
        $action = (string) $request->postData('action');

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $day)) {
            $query = Shift::query()->whereRaw('DATE(start) = ?', [$day]);

            if ($action === 'release_now') {
                $query->update(['signup_starts_at' => null]);
                engelsystem_log('Shift signup released (now) for day ' . $day);
                success(__('shift_release.released_now', [$day]));
            } elseif ($action === 'set') {
                $datetime = (string) $request->postData('signup_starts_at');
                $ts = strtotime($datetime);
                if ($ts === false) {
                    error(__('shift_release.invalid_datetime'));
                } else {
                    $value = date('Y-m-d H:i:s', $ts);
                    $query->update(['signup_starts_at' => $value]);
                    engelsystem_log('Shift signup release set to ' . $value . ' for day ' . $day);
                    success(__('shift_release.set_done', [$day, $value]));
                }
            }
        }
        throw_redirect(url('/shift-release'));
    }

    // Tage mit Schichten + aktueller Freischalt-Status
    $rows = Shift::query()
        ->selectRaw('DATE(start) AS day, COUNT(*) AS shifts_count,'
            . ' SUM(signup_starts_at IS NULL) AS free_count,'
            . ' MIN(signup_starts_at) AS min_start, MAX(signup_starts_at) AS max_start')
        ->groupByRaw('DATE(start)')
        ->orderByRaw('DATE(start)')
        ->get();

    if ($rows->isEmpty()) {
        return [shift_release_title(), info(__('shift_release.no_shifts'), true)];
    }

    $now = (new \Carbon\Carbon())->format('Y-m-d\TH:i');
    $tbody = '';
    foreach ($rows as $row) {
        $day = $row->day;
        $total = (int) $row->shifts_count;
        $free = (int) $row->free_count;

        if ($free === $total) {
            $status = '<span class="text-success">' . __('shift_release.status_free') . '</span>';
        } elseif ($free === 0 && $row->min_start === $row->max_start) {
            $isFuture = strtotime($row->min_start) > time();
            $status = '<span class="' . ($isFuture ? 'text-warning' : 'text-success') . '">'
                . __('shift_release.status_at', [$row->min_start]) . '</span>';
        } else {
            $status = '<span class="text-info">' . __('shift_release.status_mixed') . '</span>';
        }

        $prefill = $row->min_start ? date('Y-m-d\TH:i', strtotime($row->min_start)) : $now;

        $form = '<form method="post" action="' . url('/shift-release') . '" class="d-flex gap-2 align-items-center flex-wrap">'
            . form_csrf()
            . '<input type="hidden" name="day" value="' . htmlspecialchars($day) . '">'
            . '<input type="datetime-local" name="signup_starts_at" value="' . htmlspecialchars($prefill)
            . '" class="form-control form-control-sm" style="width:auto">'
            . '<button type="submit" name="action" value="set" class="btn btn-sm btn-warning">'
            . __('shift_release.btn_set') . '</button>'
            . '<button type="submit" name="action" value="release_now" class="btn btn-sm btn-success">'
            . __('shift_release.btn_now') . '</button>'
            . '<input type="hidden" name="submit" value="1">'
            . '</form>';

        $tbody .= '<tr>'
            . '<td class="text-nowrap"><strong>' . htmlspecialchars($day) . '</strong></td>'
            . '<td>' . $total . '</td>'
            . '<td>' . $status . '</td>'
            . '<td>' . $form . '</td>'
            . '</tr>' . "\n";
    }

    $content = info(__('shift_release.hint'), true)
        . '<table class="table table-striped"><thead><tr>'
        . '<th>' . __('shift_release.day') . '</th>'
        . '<th>' . __('shift_release.shifts') . '</th>'
        . '<th>' . __('shift_release.status') . '</th>'
        . '<th>' . __('shift_release.action') . '</th>'
        . '</tr></thead><tbody>' . $tbody . '</tbody></table>';

    return [shift_release_title(), $content];
}
