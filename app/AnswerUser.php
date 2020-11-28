<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerUser extends Model
{
    protected $table='answer_users';
    protected $fillable=[
        'user_id',
        'question_id',
        'answer'
    ];
}
