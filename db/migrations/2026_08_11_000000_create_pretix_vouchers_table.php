<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePretixVouchersTable extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->create('pretix_vouchers', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('code', 64)->unique();
            $table->integer('used_by_user_id')->unsigned()->nullable();
            $table->timestamp('used_at')->nullable();
            $table->timestamps();

            $table->foreign('used_by_user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->dropIfExists('pretix_vouchers');
    }
}
