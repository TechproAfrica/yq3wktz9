<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->unsignedBigInteger('address_id');
            $table->integer('phoneNumber')->unique();
            $table->integer('telNumber');
            $table->text('primaryEmail')->unique();
            $table->text('secondaryEmail')->unique();
            $table->unsignedBigInteger('position_id');
            $table->date('hireDate');
            $table->decimal('salary');
            $table->boolean('isActive')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('position_id')->references('id')->on('positions');
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
        Schema::dropIfExists('staff');
    }
}
