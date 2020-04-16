<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('day_id')->unsigned();
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('time_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned()->nullable();
            $table->bigInteger('lesson_id')->unsigned()->nullable();
            $table->integer('number_student')->unsigned()->nullable();
            $table->foreign('day_id')->references('id')->on('days');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->foreign('time_id')->references('id')->on('times');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->foreign('lesson_id')->references('id')->on('lessons');
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
        Schema::dropIfExists('schedules');
    }
}
