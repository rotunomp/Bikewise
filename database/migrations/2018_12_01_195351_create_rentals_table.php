<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('bikeId')->unsigned();
            $table->integer('accessoryListId')->unsigned();
            $table->integer('personId')->unsigned();
            $table->dateTime('dateCreated');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->double('price');
            $table->string('length');
            $table->char('gender');
            $table->boolean('isDelivered');
            $table->boolean('isReturned');
            $table->boolean('isPaid');
            $table->integer('frameSize');
            $table->string('serialNumber')->nullable();
            $table->string('transactionID')->nullable();
        });

        Schema::table('rentals', function (Blueprint $table) {
            $table->foreign('bikeId')->references('id')->on('bikes');
            $table->foreign('accessoryListId')->references('id')->on('packages');
            $table->foreign('personId')->references('id')->on('persons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
