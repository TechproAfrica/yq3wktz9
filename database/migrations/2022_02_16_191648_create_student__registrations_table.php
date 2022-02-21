<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student__registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->boolean('isActive')->default(true);
             $table->timestamps();

             $table->foreign('student_id')->references('id')->on('students');
              $table->foreign('grade_id')->references('id')->on('grades');
               $table->foreign('section_id')->references('id')->on('sections');
                $table->foreign('academic_year_id')->references('id')->on('academic_years');

                $table->primary(['student_id', 'academic_year_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student__registrations');
    }
}
