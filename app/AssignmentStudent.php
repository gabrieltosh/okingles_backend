<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentStudent extends Model
{
    protected $table='assignment_students';
    protected $fillable=[
        'schedule_id',
        'student_id'
    ];
    public function student(){
        return $this->belongsTo(User::class,'student_id');
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
}
