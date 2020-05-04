<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('schedule_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('skills_id')->unsigned()->nullable();
            $table->bigInteger('detail_lesson_id')->unsigned()->nullable();
            $table->float('percentage')->nullable();
            $table->boolean('absent')->nullable()->default(0);
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('detail_lesson_id')->references('id')->on('detail_lessons');
            $table->foreign('skills_id')->references('id')->on('skills');
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
        Schema::dropIfExists('assignment_students');
    }
}
