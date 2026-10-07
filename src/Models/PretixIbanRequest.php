<?php

declare(strict_types=1);

namespace Engelsystem\Models;

use Carbon\Carbon;
use Engelsystem\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int         $user_id
 * @property string      $order_code
 * @property string      $token_hash
 * @property string      $status
 * @property string      $reason
 * @property string|null $account_holder
 * @property string|null $iban
 * @property string|null $bic
 * @property int         $failed_attempts
 * @property int         $reminders_sent
 * @property Carbon|null $sent_at
 * @property Carbon|null $last_reminder_at
 * @property Carbon      $expires_at
 * @property Carbon|null $submitted_at
 *
 * @property-read User $user
 */
class PretixIbanRequest extends BaseModel
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_SUBMITTED = 'submitted';
    public const STATUS_EXPIRED = 'expired';

    public const MAX_FAILED_ATTEMPTS = 10;

    /** @var bool Enable timestamps */
    public $timestamps = true; // phpcs:ignore

    /** @var array<string, string> */
    protected $casts = [ // phpcs:ignore
        'user_id' => 'integer',
        'failed_attempts' => 'integer',
        'reminders_sent' => 'integer',
        'sent_at' => 'datetime',
        'last_reminder_at' => 'datetime',
        'expires_at' => 'datetime',
        'submitted_at' => 'datetime',
    ];

    /** @var array<string> */
    protected $fillable = [ // phpcs:ignore
        'user_id',
        'order_code',
        'token_hash',
        'status',
        'reason',
        'account_holder',
        'iban',
        'bic',
        'failed_attempts',
        'reminders_sent',
        'sent_at',
        'last_reminder_at',
        'expires_at',
        'submitted_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function hashToken(string $token): string
    {
        return hash('sha256', $token);
    }

    public static function findByToken(string $token): ?self
    {
        if (!preg_match('/^[a-f0-9]{64}$/', $token)) {
            return null;
        }

        return self::query()->where('token_hash', self::hashToken($token))->first();
    }

    public function isUsable(): bool
    {
        return $this->status === self::STATUS_PENDING
            && $this->expires_at->isFuture()
            && $this->failed_attempts < self::MAX_FAILED_ATTEMPTS;
    }
}
