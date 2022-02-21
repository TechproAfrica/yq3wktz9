<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('roll_no')->unique();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('gender');
            $table->date('dateOfBirth');
            $table->unsignedBigInteger('county_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('demography_id');
            $table->integer('phoneNumber')->unique();
            $table->integer('telNumber');
            $table->text('email')->unique();
            $table->string('picture');
            $table->unsignedBigInteger('user_id');
            $table->date('admissionDate');
            $table->boolean('isActive')->default(false);

            $table->timestamps();

            $table->foreign('county_id')->references('id')->on('counties');
             $table->foreign('country_id')->references('id')->on('countries');
              $table->foreign('address_id')->references('id')->on('addresses');
               $table->foreign('demography_id')->references('id')->on('demographies');
                $table->foreign('user_id')->references('id')->on('users');
                 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
