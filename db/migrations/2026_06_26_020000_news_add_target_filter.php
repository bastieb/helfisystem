<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class NewsAddTargetFilter extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->table('news', function (Blueprint $table): void {
            // helfisystem: JSON-Zielgruppenfilter; NULL = an alle
            $table->text('target_filter')->nullable()->after('is_highlighted');
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->table('news', function (Blueprint $table): void {
            $table->dropColumn('target_filter');
        });
    }
}
