<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postcodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('postcode');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->foreignId('suburb_id')->constrained('suburbs');
            $table->foreignId('state_id')->constrained('states');
            $table->timestamps();
        });

        Schema::create('postcode_distances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_postcode_id')->constrained('postcodes');
            $table->foreignId('to_postcode_id')->constrained('postcodes');
            $table->integer('distance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postcodes');
        Schema::dropIfExists('postcode_distances');
    }
};
