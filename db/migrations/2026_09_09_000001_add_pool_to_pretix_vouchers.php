<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPoolToPretixVouchers extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->table('pretix_vouchers', function (Blueprint $table): void {
            $table->string('pool', 20)->default('full')->after('code');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('pretix_vouchers', function (Blueprint $table): void {
            $table->dropColumn('pool');
        });
    }
}
