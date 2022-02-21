<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade__sections', function (Blueprint $table) {
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('classroom_id');
            $table->boolean('isActive')->default(true);
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('classroom_id')->references('id')->on('classrooms');

            $table->primary(['grade_id', 'section_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade__sections');
    }
}
