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
        Schema::create('customer_transaction', function (Blueprint $table) {
            $table->id('customer_transaction_id')->primary();
            $table->id('customer_id')->nullable();
            $table->id('order_id')->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
            $table->decimal('amount', 15, 4)->nullable();
            $table->dateTime('date_added')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_transaction');
    }
};
