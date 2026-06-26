<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class ShiftEntriesAddShiftCompleted extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->table('shift_entries', function (Blueprint $table): void {
            $table->boolean('shift_completed')
                ->default(false)
                ->after('freeloaded_comment');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('shift_entries', function (Blueprint $table): void {
            $table->dropColumn('shift_completed');
        });
    }
}
