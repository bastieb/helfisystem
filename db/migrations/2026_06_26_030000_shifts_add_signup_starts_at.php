<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class ShiftsAddSignupStartsAt extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->table('shifts', function (Blueprint $table): void {
            // helfisystem: Selbst-Anmeldung erst ab diesem Zeitpunkt; NULL = sofort frei
            $table->dateTime('signup_starts_at')->nullable()->after('end');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('shifts', function (Blueprint $table): void {
            $table->dropColumn('signup_starts_at');
        });
    }
}
