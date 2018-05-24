<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locid');
            $table->string('available');
            $table->string('qty');
            $table->string('room');
            $table->string('floor');
            $table->string('code')->nullable();
            $table->string('brand');
            $table->string('serial');
            $table->string('model');
            $table->string('size');
            $table->string('year',4);
            $table->string('result');
            $table->string('note1');
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
        Schema::dropIfExists('ups');
    }
}
