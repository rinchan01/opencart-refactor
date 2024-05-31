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
        Schema::create("address", function(Blueprint $table) {
            $table->id("address_id")->primary();
            $table->id("customer_id")->nullable();
            $table->string("firstname", 32)->collation("utf8mb4_general_ci");
            $table->string("lastname", 32)->collation("utf8mb4_general_ci");
            $table->string("company", 40)->collation("utf8mb4_general_ci")->nullable();
            $table->string("address_1", 128)->collation("utf8mb4_general_ci");
            $table->string("address_2", 128)->collation("utf8mb4_general_ci")->nullable();
            $table->string("city", 128)->collation("utf8mb4_general_ci");
            $table->string("postcode", 10)->collation("utf8mb4_general_ci");
            $table->id("country_id");
            $table->id("zone_id");
            $table->string("custom_field", 255)->collation("utf8mb4_general_ci")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
