<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff__subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('subject_id');
            $table->boolean('isActive')->default(true);
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->primary(['staff_id', 'subject_id']);
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff__subjects');
    }
}
