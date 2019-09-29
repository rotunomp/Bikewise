<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        // TODO: get accessory categories right

        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->double('price');
            $table->boolean('isShopPackage');
            $table->integer('accessoryLight')->nullable()->unsigned();
            $table->integer('accessoryKickstand')->nullable()->unsigned();
            $table->integer('accessoryLock')->nullable()->unsigned();
            $table->integer('accessoryBack')->nullable()->unsigned();
            $table->integer('accessory5')->nullable()->unsigned();
            $table->integer('accessory6')->nullable()->unsigned();
            $table->integer('accessory7')->nullable()->unsigned();
            $table->integer('accessory8')->nullable()->unsigned();
            $table->integer('accessory9')->nullable()->unsigned();
            $table->integer('accessory10')->nullable()->unsigned();
            $table->integer('accessory11')->nullable()->unsigned();
            $table->integer('accessory12')->nullable()->unsigned();
            $table->integer('accessory13')->nullable()->unsigned();
            $table->integer('accessory14')->nullable()->unsigned();
            $table->integer('accessory15')->nullable()->unsigned();
            $table->text('description')->nullable();
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->foreign('accessoryLight')->references('id')->on('accessories');
            $table->foreign('accessoryKickstand')->references('id')->on('accessories');
            $table->foreign('accessoryLock')->references('id')->on('accessories');
            $table->foreign('accessoryBack')->references('id')->on('accessories');
            $table->foreign('accessory5')->references('id')->on('accessories');
            $table->foreign('accessory6')->references('id')->on('accessories');
            $table->foreign('accessory7')->references('id')->on('accessories');
            $table->foreign('accessory8')->references('id')->on('accessories');
            $table->foreign('accessory9')->references('id')->on('accessories');
            $table->foreign('accessory10')->references('id')->on('accessories');
            $table->foreign('accessory11')->references('id')->on('accessories');
            $table->foreign('accessory12')->references('id')->on('accessories');
            $table->foreign('accessory13')->references('id')->on('accessories');
            $table->foreign('accessory14')->references('id')->on('accessories');
            $table->foreign('accessory15')->references('id')->on('accessories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
