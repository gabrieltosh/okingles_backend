<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorasTable extends Migration
{
  
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('start');
            $table->string('end');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('horas');
    }
}
