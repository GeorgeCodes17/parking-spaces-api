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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string("email", 255);
            $table->unsignedBigInteger("_fk_parking_space");
            $table->unsignedBigInteger("_fk_pricing_profile");
            $table->datetime("start");
            $table->datetime("end");
            $table->boolean("is_cancelled")->nullable();
            $table->timestamps();

            $table->foreign("_fk_parking_space")->references("id")->on("parking_spaces");
            $table->foreign("_fk_pricing_profile")->references("id")->on("pricing_profiles");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
