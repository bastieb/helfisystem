<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDayTicketDealToUsersPersonalData extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->table('users_personal_data', function (Blueprint $table): void {
            $table->boolean('day_ticket_deal_confirmed')->default(false)->after('pretix_order_paid');
            $table->string('day_ticket_deal_day', 3)->nullable()->after('day_ticket_deal_confirmed');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('users_personal_data', function (Blueprint $table): void {
            $table->dropColumn(['day_ticket_deal_confirmed', 'day_ticket_deal_day']);
        });
    }
}
