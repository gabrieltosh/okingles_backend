<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $table='modules';
    protected $fillable=[
        'name',
        'route',
        'sub_module',
        'icon'
    ];
    public function sub_module(){
        return $this->belongsTo(Module::class,'sub_module');
    }
    public function module(){
        return $this->hasMany(Module::class,'sub_module','id');
    }
}
