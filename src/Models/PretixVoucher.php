<?php

declare(strict_types=1);

namespace Engelsystem\Models;

use Carbon\Carbon;
use Engelsystem\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @property int         $id
 * @property string      $code
 * @property string      $pool
 * @property int|null    $used_by_user_id
 * @property Carbon|null $used_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read User|null $usedBy
 *
 * @method static QueryBuilder|PretixVoucher[] whereCode($value)
 * @method static QueryBuilder|PretixVoucher[] whereUsedByUserId($value)
 */
class PretixVoucher extends BaseModel
{
    /** @var bool Enable timestamps */
    public $timestamps = true; // phpcs:ignore

    /** @var array<string, string> */
    protected $casts = [ // phpcs:ignore
        'used_by_user_id' => 'integer',
        'used_at'         => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [ // phpcs:ignore
        'code',
        'pool',
        'used_by_user_id',
        'used_at',
    ];

    /** helfisystem: voucher pool identifiers */
    public const POOL_FULL = 'full';
    public const POOL_DAY_ANY = 'day_any';
    public const POOL_DAY_FRI = 'day_fri';
    public const POOL_DAY_SAT = 'day_sat';
    public const POOL_DAY_SUN = 'day_sun';

    public function usedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'used_by_user_id');
    }
}
