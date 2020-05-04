<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;
use Carbon\Carbon;
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
        $day=Days::where('id',$this->id)->first();
        $date=Carbon::parse($day->day_date);
        $now = Carbon::now()->format('Y-m-d');
        if($date->lessThan($now)){
            return 0;
        }else{
            return 1;
        }
    }
}
