<?php

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class ShiftEntryAddShiftCompleted extends Migration
{
    use Reference;

    /**
     * Run the migration
     */
    public function up()
    {
        $this->schema->table('ShiftEntry', function (Blueprint $table) {
            $table->boolean('shift_completed')
                ->default(false);
        });
    }

    /**
     * Reverse the migration
     */
    public function down()
    {
        $this->schema->table('ShiftEntry', function (Blueprint $table) {
            $table->dropColumn('shift_completed');
        });
    }
}
