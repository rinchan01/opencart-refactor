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
        Schema::create('customer_authorize', function (Blueprint $table) {
            $table->id('customer_authorize_id')->primary();
            $table->id('customer_id')->nullable();
            $table->string('token', 96)->collation('utf8mb4_unicode_ci')->nullable();
            $table->integer('total')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('user_agent')->collation('utf8mb4_unicode_ci')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->dateTime('date_added')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_authorize');
    }
};
