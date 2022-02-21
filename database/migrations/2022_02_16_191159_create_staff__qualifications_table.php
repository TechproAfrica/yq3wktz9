<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff__qualifications', function (Blueprint $table) {
            $table->unsignedBigInteger('qualification_id');
            $table->unsignedBigInteger('staff_id');
            $table->string('institution');
            $table->string('major');
            $table->date('yearGraduated');
            $table->boolean('isActive')->default(true);
            $table->timestamps();

            $table->foreign('qualification_id')->references('id')->on('qualifications');
            $table->foreign('staff_id')->references('id')->on('staff');

            $table->primary(['staff_id', 'qualification_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff__qualifications');
    }
}
