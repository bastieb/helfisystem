<?php

declare(strict_types=1);

namespace Engelsystem\Models;

use Carbon\Carbon;
use Engelsystem\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @property int         $id
 * @property int         $user_id
 * @property string      $order_code
 * @property int|null    $pretix_refund_local_id
 * @property float       $amount
 * @property string|null $account_holder
 * @property string|null $iban
 * @property string|null $bic
 * @property string      $state
 * @property Carbon|null $synced_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read User $user
 *
 * @method static QueryBuilder|PretixRefund[] whereUserId($value)
 * @method static QueryBuilder|PretixRefund[] whereState($value)
 */
class PretixRefund extends BaseModel
{
    /** @var bool Enable timestamps */
    public $timestamps = true; // phpcs:ignore

    /** @var array<string, string> */
    protected $casts = [ // phpcs:ignore
        'user_id' => 'integer',
        'pretix_refund_local_id' => 'integer',
        'amount' => 'float',
        'synced_at' => 'datetime',
    ];

    /** @var array<string> */
    protected $fillable = [ // phpcs:ignore
        'user_id',
        'order_code',
        'pretix_refund_local_id',
        'amount',
        'account_holder',
        'iban',
        'bic',
        'state',
        'synced_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
