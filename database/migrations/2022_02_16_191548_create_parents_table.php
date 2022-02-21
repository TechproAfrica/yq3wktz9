<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->integer('phoneNumber');
            $table->integer('telNumber');
            $table->text('email')->unique();
            $table->boolean('isPrimaryContact')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('createdBy');
            $table->unsignedBigInteger('modifiedBy');
            $table->unsignedBigInteger('address_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('createdBy')->references('id')->on('users');
              $table->foreign('modifiedBy')->references('id')->on('users');
               $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
