<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username', 20)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('firstname', 32)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('lastname', 32)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('email', 96)->collation('utf8mb4_unicode_ci')->nullable();
            $table->integer('user_group_id')->nullable();
            $table->string('password', 255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('image', 255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('code', 40)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('user_agent', 255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('users');
        // Schema::dropIfExists('password_reset_tokens');
    }
};
