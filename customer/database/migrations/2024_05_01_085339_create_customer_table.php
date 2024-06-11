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
        Schema::create('language', function (Blueprint $table) {
            $table->id('language_id');
            $table->string('name', 32)->collation('utf8mb4_general_ci')->nullable();
            $table->string('code', 5)->collation('utf8mb4_general_ci')->nullable();
            $table->string('extension', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('sort_order')->nullable();
        });

        Schema::create('store', function (Blueprint $table) {
            $table->id('store_id');
            $table->string('name', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->string('url', 255)->collation('utf8mb4_general_ci')->nullable();
        });

        Schema::create('customer_group', function (Blueprint $table) {
            $table->id('customer_group_id');
            $table->integer('approval')->nullable();
            $table->integer('sort_order')->nullable();
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id('customer_id');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('store_id')->on('store')->onDelete('cascade');
            $table->unsignedBigInteger('customer_group_id')->nullable();
            $table->foreign('customer_group_id')->references('customer_group_id')->on('customer_group')->onDelete('cascade');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('language_id')->on('language')->onDelete('cascade');
            $table->string('firstname', 32)->collation('utf8mb4_unicode_ci');
            $table->string('lastname', 32)->collation('utf8mb4_unicode_ci');
            $table->string('email', 96)->collation('utf8mb4_unicode_ci');
            $table->string('telephone', 32)->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('customer_field')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('password', 40)->collation('utf8mb4_unicode_ci')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_unicode_ci')->nullable();
            $table->tinyInteger('newsletter')->nullable();
            $table->tinyInteger('safe')->nullable();
            $table->tinyInteger('commenter')->nullable();
            $table->text('token')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('code')->collation('utf8mb4_unicode_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_activity', function (Blueprint $table) {
            $table->id('customer_activity_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->string('key', 64)->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('data')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_unicode_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_approval', function (Blueprint $table) {
            $table->id('customer_approval_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->string('type', 9)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_group_description', function (Blueprint $table) {
            $table->id('customer_group_id');
            $table->unsignedInteger('language_id')->nullable();
            $table->string('name', 32)->collation('utf8mb4_general_ci')->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
            $table->timestamps();
        });
        Schema::create('customer_history', function (Blueprint $table) {
            $table->id('customer_history_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->text('comment')->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_reward', function (Blueprint $table) {
            $table->id('customer_reward_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
            $table->integer('points')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_wishlist', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('store')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->dateTime('date_added')->nullable();
            $table->primary(['customer_id', 'store_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language');
        Schema::dropIfExists('store');
        Schema::dropIfExists('customer_group');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('customer_wishlist');
    }
};
