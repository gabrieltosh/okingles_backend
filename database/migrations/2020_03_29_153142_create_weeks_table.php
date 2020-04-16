<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksTable extends Migration
{

    public function up()
    {
        Schema::create('weeks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->bigInteger('branch_office_id')->unsigned();
            $table->foreign('branch_office_id')->references('id')->on('branch_offices');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('weeks');
    }
}
