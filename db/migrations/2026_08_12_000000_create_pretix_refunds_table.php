<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePretixRefundsTable extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->create('pretix_refunds', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('order_code', 16);
            $table->integer('pretix_refund_local_id')->unsigned()->nullable();
            $table->decimal('amount', 8, 2);
            // created | transit | external | canceled | failed | done (Pretix refund states)
            $table->string('state', 16)->default('created');
            $table->timestamp('synced_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->dropIfExists('pretix_refunds');
    }
}
