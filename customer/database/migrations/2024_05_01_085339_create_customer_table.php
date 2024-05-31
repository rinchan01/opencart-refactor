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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('customer_id')->primary();
            $table->id('customer_group_id')->nullable();
            $table->id('store_id')->nullable()->default(0);
            $table->id('language_id')->nullable();
            $table->string('firstname', 32)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('lastname', 32)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('email', 96)->collation('utf8mb4_unicode_ci')->nullable();
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
            $table->id('customer_activity_id')->primary();
            $table->id('customer_id')->nullable();
            $table->string('key', 64)->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('data')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('ip', 40)->collation('utf8mb4_unicode_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_approval', function (Blueprint $table) {
            $table->id('customer_approval_id')->primary();
            $table->id('customer_id')->nullable();
            $table->string('type', 9)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });
        Schema::create('customer_group', function (Blueprint $table) {
            $table->id('customer_group_id')->primary();
            $table->integer('approval')->nullable();
            $table->integer('sort_order')->nullable();
        });
        Schema::create('customer_group_description', function (Blueprint $table) {
            $table->id('customer_group_id')->primary();
            $table->id('language_id');
            $table->string('name', 32)->collation('utf8mb4_general_ci')->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
            $table->timestamps();
        });
        Schema::create('customer_history', function (Blueprint $table) {
            $table->id('customer_history_id')->primary();
            $table->id('customer_id')->nullable();
            $table->text('comment')->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_reward', function (Blueprint $table) {
            $table->id('customer_reward_id')->primary();
            $table->id('customer_id')->nullable();
            $table->id('order_id')->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
            $table->integer('points')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_wishlist', function (Blueprint $table) {
            $table->id('customer_id');
            $table->id('store_id');
            $table->id('product_id');
            $table->dateTime('date_added')->nullable();
            $table->primary(['customer_id', 'store_id', 'product_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
