<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRectifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rectifiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locid');
            $table->string('available');
            $table->string('qty');
            $table->string('code')->nullable();
            $table->string('brand');
            $table->string('ctrlserial');
            $table->string('year',4);
            $table->string('rectvolt');
            $table->string('currload');
            $table->string('rectmodule');
            $table->string('unit');
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
        Schema::dropIfExists('rectifiers');
    }
}
