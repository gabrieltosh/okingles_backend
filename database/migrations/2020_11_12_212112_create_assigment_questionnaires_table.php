<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigmentQuestionnairesTable extends Migration
{
    public function up()
    {
        Schema::create('assigment_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('schedule_id')->unsigned();
            $table->bigInteger('questionnaire_id')->unsigned();
            $table->enum('status',['enable','disable']);
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('assigment_questionnaires');
    }
}
