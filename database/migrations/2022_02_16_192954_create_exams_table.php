<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('staff_id');
            $table->float('mark');
            $table->timestamps();

            $table->foreign('time_id')->references('id')->on('times');
             $table->foreign('academic_year_id')->references('id')->on('academic_years');
              $table->foreign('subject_id')->references('id')->on('subjects');
               $table->foreign('staff_id')->references('id')->on('staff');
                $table->foreign('student_id')->references('id')->on('students');

            $table->primary(['student_id', 'academic_year_id', 'time_id', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
