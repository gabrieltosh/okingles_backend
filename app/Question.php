<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table='questions';
    protected $fillable=[
        'questionnaire_id',
        'question',
        'type',
        'order_by',
        'file',
        'description',
        'status'
    ];
    public function options(){
        return $this->hasMany(Options::class);
    }
    public function answer_valid(){
        return $this->hasMany(AnswerValid::class);
    }
}
