<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountyDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('county__districts', function (Blueprint $table) {
            $table->unsignedBigInteger('county_id');
            $table->unsignedBigInteger('district_id');
            $table->timestamps();

            $table->foreign('county_id')->references('id')->on('counties');
             $table->foreign('district_id')->references('id')->on('districts');

             $table->primary(['county_id', 'district_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('county__districts');
    }
}
