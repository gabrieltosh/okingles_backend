<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Week extends Model
{
    protected $table='weeks';
    protected $fillable=[
        'title',
        'start',
        'end',
        'branch_office_id'
    ];
    protected $appends = ['delete'];

    public function days()
    {
        return $this->hasMany(Days::class,'week_id');
    }
    public function branch_office()
    {
        return $this->belongsTo(BranchOffice::class,'branch_office_id') ;
    }
    public function getDeleteAttribute()
    {
        $days=DB::table('days')
                ->select('schedules.id')
                ->join('schedules', 'schedules.day_id', '=', 'days.id')
                ->where('days.week_id',$this->id)
                ->count();
        if($days>0){
            return 0;
        }else{
            return 1;
        }
    }
   
}
