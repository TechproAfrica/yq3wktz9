<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_reps', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('studentRelationship');
            $table->boolean('isActive')->default(true);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('parents');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('studentRelationship')->references('id')->on('rtypes');

            $table->primary(['parent_id', 'student_id','studentRelationship']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_reps');
    }
}
