<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('locationable_id');
            $table->string('locationable_type');
            $table->point('location_point');
            $table->string('building_name')->nullable();
            $table->string('address_map');
            $table->string('address');
            $table->integer('city_id');
            $table->integer('province_id');
            $table->integer('country_id')->default(1);
            $table->string('phone')->nullable();
            $table->string('user_role')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
