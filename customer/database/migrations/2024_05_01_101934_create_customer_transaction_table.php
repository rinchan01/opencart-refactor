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
            $table->id('customer_transaction_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer')->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->nullable();
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
        // Schema::dropIfExists('customer_transaction');
    }
};
