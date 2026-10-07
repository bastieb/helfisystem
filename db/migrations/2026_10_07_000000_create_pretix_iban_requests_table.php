<?php

declare(strict_types=1);

namespace Engelsystem\Migrations;

use Engelsystem\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePretixIbanRequestsTable extends Migration
{
    /**
     * Run the migration
     */
    public function up(): void
    {
        $this->schema->create('pretix_iban_requests', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('order_code', 16);
            // Nur der SHA-256-Hash des Links wird gespeichert, der Klartext-Token steht nur in der Mail
            $table->string('token_hash', 64)->unique();
            // pending | submitted | expired
            $table->string('status', 16)->default('pending');
            $table->string('reason', 32);
            $table->string('account_holder')->nullable();
            $table->string('iban', 34)->nullable();
            $table->string('bic', 11)->nullable();
            $table->unsignedTinyInteger('failed_attempts')->default(0);
            $table->unsignedTinyInteger('reminders_sent')->default(0);
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('last_reminder_at')->nullable();
            $table->timestamp('expires_at');
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->index(['user_id', 'status']);
        });
    }

    /**
     * Reverse the migration
     */
    public function down(): void
    {
        $this->schema->dropIfExists('pretix_iban_requests');
    }
}
