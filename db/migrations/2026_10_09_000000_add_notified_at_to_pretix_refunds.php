<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNotifiedAtToPretixRefunds extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        // Zeitpunkt der Info-Mail "Erstattung veranlasst" an den Helfi (NULL = noch nicht informiert)
        $this->schema->table('pretix_refunds', function (Blueprint $table): void {
            $table->timestamp('notified_at')->nullable()->after('synced_at');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('pretix_refunds', function (Blueprint $table): void {
            $table->dropColumn('notified_at');
        });
    }
}
