<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table='materials';
    protected $fillable=[
        'title',
        'description'
    ];
    public function files(){
        return $this->hasMany(MaterialFile::class);
    }
    public function links(){
        return $this->hasMany(MaterialLink::class);
    }
}
