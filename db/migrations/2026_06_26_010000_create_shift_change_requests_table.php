<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShiftChangeRequestsTable extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->create('shift_change_requests', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('shift_entry_id')->unsigned()->nullable();
            $table->integer('shift_id')->unsigned();
            $table->text('reason');
            // pending | approved | rejected
            $table->string('status', 16)->default('pending');
            $table->integer('decided_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('shift_entry_id')->references('id')->on('shift_entries')->nullOnDelete();
            $table->foreign('decided_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->dropIfExists('shift_change_requests');
    }
}
