<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailLesson extends Model
{
    protected $table='detail_lessons';
    protected $fillable=[
        'name',
        'lesson_id'
    ];
}
