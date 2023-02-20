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
        Schema::create('suburbs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('key', 50);
            $table->double('latitude');
            $table->double('longitude');
            $table->foreignId('region_id')->constrained('regions');
            $table->foreignId('state_id')->constrained('states');
            $table->timestamps();
        });

        Schema::create('suburb_distances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_suburb_id')->constrained('suburbs');
            $table->foreignId('to_suburb_id')->constrained('suburbs');
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
        Schema::dropIfExists('suburbs');
        Schema::dropIfExists('suburb_distances');
    }
};
