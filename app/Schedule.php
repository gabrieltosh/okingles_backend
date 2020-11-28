<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AssignmentStudent;
use App\Time;
use App\Days;
use Carbon\Carbon;
class Schedule extends Model
{
    protected $table='schedules';
    protected $fillable=[
        'day_id',
        'classroom_id',
        'time_id',
        'teacher_id',
        'lesson_id',
        'number_student',
        'material_id',
        'link_zoom'
    ];
    protected $appends = ['assigned','valid'];
    public function getAssignedAttribute()
    {
        return AssignmentStudent::where('schedule_id',$this->id)->count();
    }
    public function getValidAttribute()
    {
        $day=Days::where('id',$this->day_id)->first();
        $time=Time::where('id',$this->time_id)->first();
        $datetime=Carbon::parse($day->day_date.' '.$time->start);
        $now = Carbon::now();
        if($now->lessThanOrEqualTo($datetime)){
            return 1;
        }else{
            return 0;
        }
    }
    public function day(){
        return $this->belongsTo(Days::class,'day_id');
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function time(){
        return $this->belongsTo(Time::class,'time_id');
    }
    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id');
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
    public function material(){
        return $this->belongsTo(Material::class,'material_id');
    }
    public function questionnaires(){
        return $this->hasMany(AssigmentQuestionnaires::class);
    }
}
