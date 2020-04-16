<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModule extends Model
{
    protected $table='profile_modules';
    protected $fillable=[
        'profile_id',
        'module_id',
        'create',
        'edit',
        'delete',
    ];
    public function profile(){
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function module(){
        return $this->belongsTo(Module::class,'module_id');
    }
}
