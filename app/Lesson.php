<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table='lessons';
    protected $fillable=[
        'name',
        'description'
    ];
    public function detail(){
        return $this->hasMany(DetailLesson::class,'lesson_id');
    }
}
