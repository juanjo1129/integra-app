<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user')->unique();
            $table->string('password');

            // ¿Qué hace esto?
            $table->boolean("marketing");
            $table->unsignedTinyInteger('status');
            $table->unsignedTinyInteger('sms');
            $table->boolean('validation');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->integer('contact_id');
            $table
                ->foreign('contact_id')
                ->references('id')
                ->on('contactos')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_user');
    }
};
