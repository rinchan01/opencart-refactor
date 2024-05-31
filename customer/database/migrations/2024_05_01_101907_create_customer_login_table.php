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
        Schema::create('customer_login', function (Blueprint $table) {
            $table->id('customer_login_id')->primary();
            $table->string('email', 96)->collation('utf8mb4_general_ci')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
            $table->dateTime('date_modified')->nullable();
        });

        Schema::create('customer_ip', function (Blueprint $table) {
            $table->id('customer_ip_id')->primary();
            $table->id('customer_id')->nullable();
            $table->id('store_id')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_general_ci')->nullable();
            $table->string('country', 2)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });
        Schema::create('customer_online', function (Blueprint $table) {
            $table->string('ip', 40)->collation('utf8mb4_general_ci')->primary();
            $table->id('customer_id')->nullable();
            $table->text('url')->collation('utf8mb4_general_ci')->nullable();
            $table->text('referer')->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_login');
    }
};
