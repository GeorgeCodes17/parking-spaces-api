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
        Schema::create('pricing_profiles', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50)->unique();
            $table->decimal("price", 9, 2);
            $table->enum("priority", [1, 2, 3, 4, 5]);
            $table->date("from");
            $table->date("end");
            $table->timestamps();
        });

        DB::statement("CREATE TRIGGER `pricing_profiles_non_updateable_columns`
            BEFORE UPDATE on `pricing_profiles` FOR EACH ROW
            BEGIN
                IF NEW.name != OLD.name THEN
                    SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'pricing_profiles.name is not allowed to be updated, stop trying to update it.';
                END IF;
                IF NEW.price != OLD.price THEN
                    SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'pricing_profiles.price is not allowed to be updated, stop trying to update it.';
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_profiles');
    }
};
