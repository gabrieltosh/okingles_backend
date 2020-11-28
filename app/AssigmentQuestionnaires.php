<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssigmentQuestionnaires extends Model
{
    protected $table='assigment_questionnaires';
    protected $fillable=[
        'schedule_id',
        'questionnaire_id',
        'status',
    ];
    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class,'questionnaire_id');
    }
}
