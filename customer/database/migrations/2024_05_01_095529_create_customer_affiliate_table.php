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
        Schema::create('customer_affiliate', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->primary('customer_id');
            $table->string('company', 60)->collation('utf8mb4_general_ci')->nullable();
            $table->string('website', 255)->collation('utf8mb4_general_ci')->nullable();
            $table->string('tracking', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->decimal('balance', 15, 4)->nullable();
            $table->decimal('commission', 4, 2)->nullable();
            $table->string('tax', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->string('payment_method', 6)->collation('utf8mb4_general_ci')->nullable();
            $table->string('cheque', 100)->collation('utf8mb4_general_ci')->nullable();
            $table->string('paypal', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->string('bank_name', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->string('bank_branch_number', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->string('bank_swift_code', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->string('bank_account_name', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->string('bank_account_number', 64)->collation('utf8mb4_general_ci')->nullable();
            $table->text('custom_field')->collation('utf8mb4_general_ci')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->dateTime('date_added')->nullable();
        });

        Schema::create('customer_affiliate_report', function (Blueprint $table) {
            $table->id('customer_affiliate_report_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('store_id')->on('store')->onDelete('cascade');
            $table->string('ip', 40)->collation('utf8mb4_general_ci')->nullable();
            $table->string('country', 2)->collation('utf8mb4_general_ci')->nullable();
            $table->dateTime('date_added')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('customer_affiliate');
    }
};
