<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerValid extends Model
{
    protected $table='answer_valids';
    protected $fillable=[
        'answer',
        'question_id'
    ];
}
