<?php

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class UsersPersonalDataAddVoucherCode extends Migration
{
    use Reference;

    /**
     * Run the migration
     */
    public function up()
    {
        $this->schema->table('users_personal_data', function (Blueprint $table) {
            $table->string('voucher_code', 40)
                ->default('')
                ->after('last_name');
        });
    }

    /**
     * Reverse the migration
     */
    public function down()
    {
        $this->schema->table('users_personal_data', function (Blueprint $table) {
            $table->dropColumn('voucher_code');
        });
    }
}
