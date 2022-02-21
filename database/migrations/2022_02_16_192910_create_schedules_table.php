<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
           // $table->id();
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->boolean('isActive')->default(false);
            $table->timestamps();

            $table->foreign('time_id')->references('id')->on('times');
            $table->foreign('day_id')->references('id')->on('days');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('staff_id')->references('id')->on('staff');

            $table->primary(['time_id', 'day_id', 'subject_id', 'staff_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
