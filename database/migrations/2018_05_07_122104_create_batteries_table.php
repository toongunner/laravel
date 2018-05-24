<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batteries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locid');
            $table->string('available');
            $table->string('qty');
            $table->string('room');
            $table->string('floor');
            $table->string('brand');
            $table->string('model');
            $table->string('size');
            $table->string('year',4);
            $table->string('unit');
            $table->string('check1');
            $table->string('note1');
            $table->string('check2');
            $table->string('note2');
            $table->string('check3');
            $table->string('note3');
            $table->string('check4');
            $table->string('note4');
            $table->string('check5');
            $table->string('note5');
            $table->string('result');
            $table->string('note6');
            $table->string('mby');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batteries');
    }
}
