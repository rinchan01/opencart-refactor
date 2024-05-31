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
        Schema::create("country", function (Blueprint $table) {
            $table->id("country_id");
            $table->string("name", 128)->collation("utf8mb4_general_ci");
            $table->string("iso_code_2", 2)->collation("utf8mb4_general_ci");
            $table->string("iso_code_3", 3)->collation("utf8mb4_general_ci");
            $table->tinyInteger("postcode_required")->default("0");
            $table->tinyInteger("status")->default("1");
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
