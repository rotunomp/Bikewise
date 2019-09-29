<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('lastName');
            $table->string('firstName');
            $table->string('homePhone')->nullable();
            $table->string('homeStreetAddress');
            $table->string('homeCity');
            $table->string('homeState');
            $table->string('homeZipCode');
            $table->string('driversLicenseNumber');
            $table->string('stateOfDriversLicense');
            $table->string('localAddress');
            $table->string('localPhone')->nullable();
            $table->string('cellPhone');
            $table->string('email');
            $table->integer('heightInches');
            $table->integer('inseam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
