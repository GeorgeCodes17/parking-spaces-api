<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parking_spaces', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->decimal("latitude", 7, 4);
            $table->decimal("longitude", 7, 4);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE parking_spaces ADD CONSTRAINT latitude_length CHECK (latitude > -90 AND latitude < 90.00);');
        DB::statement('ALTER TABLE parking_spaces ADD CONSTRAINT longitude_length CHECK (longitude > -180 AND longitude < 180.00);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_spaces');
    }
};
