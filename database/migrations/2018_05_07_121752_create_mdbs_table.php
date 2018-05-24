<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locid');
            $table->string('available');
            $table->string('qty');
            $table->string('type');
            $table->string('code')->nullable();
            $table->string('brand');
            $table->string('phrase');
            $table->string('size');
            $table->string('year',4);
            $table->string('mcb');
            $table->string('fx');
            $table->string('r');
            $table->string('s');
            $table->string('t');
            $table->string('check1');
            $table->string('note1');
            $table->string('check2');
            $table->string('note2');
            $table->string('check3');
            $table->string('note3');
            $table->string('check4');
            $table->string('note4');
            $table->string('result');
            $table->string('note5');
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
        Schema::dropIfExists('mdbs');
    }
}
