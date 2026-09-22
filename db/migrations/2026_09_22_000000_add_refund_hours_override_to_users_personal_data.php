<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRefundHoursOverrideToUsersPersonalData extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->table('users_personal_data', function (Blueprint $table): void {
            $table->decimal('refund_hours_override', 5, 2)->nullable()->after('day_ticket_deal_day');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('users_personal_data', function (Blueprint $table): void {
            $table->dropColumn('refund_hours_override');
        });
    }
}
