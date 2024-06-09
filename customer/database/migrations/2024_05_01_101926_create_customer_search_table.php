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
        Schema::create('customer_search', function (Blueprint $table) {
            $table->id('customer_search_id');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('store_id')->on('store')->onDelete('cascade');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('language_id')->on('language')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->string('keyword', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->integer('category_id')->nullable();
            $table->tinyInteger('sub_category')->nullable();
            $table->tinyInteger('description')->nullable();
            $table->integer('products')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('customer_search');
    }
};
