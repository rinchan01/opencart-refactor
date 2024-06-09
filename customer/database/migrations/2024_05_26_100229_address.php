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
        Schema::create('zone', function (Blueprint $table) {
            $table->id('zone_id');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
            $table->string('name', 128)->nullable();
            $table->string('code', 32)->nullable();
            $table->tinyInteger('status')->nullable();
        });

        Schema::create('geo_zone', function (Blueprint $table) {
            $table->id('geo_zone_id');
            $table->string('name', 32)->collation('utf8mb4_general_ci')->nullable();
            $table->text('description')->collation('utf8mb4_general_ci')->nullable();
        });
        Schema::create('zone_to_geo_zone', function (Blueprint $table) {
            $table->id('zone_to_geo_zone_id');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->foreign('zone_id')->references('zone_id')->on('zone')->onDelete('cascade');
            $table->unsignedBigInteger('geo_zone_id')->nullable();
            $table->foreign('geo_zone_id')->references('geo_zone_id')->on('geo_zone')->onDelete('cascade');
        });
        Schema::create("address", function(Blueprint $table) {
            $table->id("address_id");
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->foreign("customer_id")->references("customer_id")->on("customer")->onDelete("cascade");
            $table->string("firstname", 32)->collation("utf8mb4_general_ci");
            $table->string("lastname", 32)->collation("utf8mb4_general_ci");
            $table->string("company", 40)->collation("utf8mb4_general_ci")->nullable();
            $table->string("address_1", 128)->collation("utf8mb4_general_ci");
            $table->string("address_2", 128)->collation("utf8mb4_general_ci")->nullable();
            $table->string("city", 128)->collation("utf8mb4_general_ci");
            $table->string("postcode", 10)->collation("utf8mb4_general_ci");
            $table->unsignedBigInteger("country_id");
            $table->foreign("country_id")->references("country_id")->on("country")->onDelete("cascade");
            $table->unsignedBigInteger("zone_id");
            $table->foreign("zone_id")->references("zone_id")->on("zone")->onDelete("cascade");
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
