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
            $table->id('customer_login_id');
            $table->string('email', 96)->collation('utf8mb4_general_ci')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
            $table->dateTime('date_modified')->nullable();
        });

        Schema::create('customer_ip', function (Blueprint $table) {
            $table->id('customer_ip_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('store_id')->on('store')->onDelete('cascade');
            $table->string('ip', 40)->collation('utf8mb4_general_ci')->nullable();
            $table->string('country', 2)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });
        Schema::create('customer_online', function (Blueprint $table) {
            $table->string('ip', 40)->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
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
        // Schema::dropIfExists('customer_login');
    }
};
