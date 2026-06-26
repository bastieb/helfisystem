<?php

declare(strict_types=1);

namespace Engelsystem\Models\Shifts;

use Engelsystem\Models\BaseModel;
use Engelsystem\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * helfisystem: Antrag zum Austragen/Umtragen aus einer Schicht (Admin-Freigabe nötig).
 *
 * @property int             $id
 * @property int             $user_id
 * @property int|null        $shift_entry_id
 * @property int             $shift_id
 * @property string          $reason
 * @property string          $status     pending|approved|rejected
 * @property int|null        $decided_by
 *
 * @property-read User       $user
 * @property-read ShiftEntry $shiftEntry
 * @property-read Shift      $shift
 * @property-read User|null  $decidedBy
 *
 * @method static QueryBuilder|ShiftChangeRequest[] whereStatus($value)
 * @method static QueryBuilder|ShiftChangeRequest[] whereUserId($value)
 * @method static QueryBuilder|ShiftChangeRequest[] whereShiftEntryId($value)
 */
class ShiftChangeRequest extends BaseModel
{
    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const REJECTED = 'rejected';

    /** @var string */
    protected $table = 'shift_change_requests'; // phpcs:ignore

    /** @var bool enable timestamps */
    public $timestamps = true; // phpcs:ignore

    /** @var array<string, string|null> default attributes */
    protected $attributes = [ // phpcs:ignore
        'status'         => self::PENDING,
        'shift_entry_id' => null,
        'decided_by'     => null,
    ];

    /** @var array<string> */
    protected $fillable = [ // phpcs:ignore
        'user_id',
        'shift_entry_id',
        'shift_id',
        'reason',
        'status',
        'decided_by',
    ];

    /** @var array<string, string> */
    protected $casts = [ // phpcs:ignore
        'user_id'        => 'integer',
        'shift_entry_id' => 'integer',
        'shift_id'       => 'integer',
        'decided_by'     => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shiftEntry(): BelongsTo
    {
        return $this->belongsTo(ShiftEntry::class);
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }

    public function decidedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'decided_by');
    }
}
