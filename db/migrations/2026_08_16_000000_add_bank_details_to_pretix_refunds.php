<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBankDetailsToPretixRefunds extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->table('pretix_refunds', function (Blueprint $table): void {
            $table->string('account_holder', 191)->nullable()->after('amount');
            $table->string('iban', 34)->nullable()->after('account_holder');
            $table->string('bic', 11)->nullable()->after('iban');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('pretix_refunds', function (Blueprint $table): void {
            $table->dropColumn(['account_holder', 'iban', 'bic']);
        });
    }
}
