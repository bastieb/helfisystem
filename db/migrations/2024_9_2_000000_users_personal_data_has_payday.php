<?php

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class UsersPersonalDataHasPayday extends Migration
{
    use Reference;

    /**
     * Run the migration
     */
    public function up()
    {
        $this->schema->table('users_personal_data', function (Blueprint $table) {
            $table->boolean('has_payday')
                ->default(false);
        });
    }

    /**
     * Reverse the migration
     */
    public function down()
    {
        $this->schema->table('users_personal_data', function (Blueprint $table) {
            $table->dropColumn('has_payday');
        });
    }
}
