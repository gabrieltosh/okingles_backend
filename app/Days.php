<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;
class Days extends Model
{
    protected $table='days';
    protected $fillable=[
        'name',
        'day_date',
        'week_id',
        'status'
    ];
    protected $appends = ['deactivate'];

    public function week(){
        return $this->belongsTo(Week::class,'week_id');
    }
    public function getDeactivateAttribute()
    {
        $schedule=Schedule::where('day_id',$this->id)->count();
        if($schedule>0){
            return 0;
        }else{
            return 1;
        }
    }
}
