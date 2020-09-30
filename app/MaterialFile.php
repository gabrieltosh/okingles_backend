<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialFile extends Model
{
    protected $table='material_files';
    protected $fillable=[
        'name',
        'location',
        'type',
        'material_id'
    ];
    public function material(){
        return $this->belongsTo(Material::class,'material_id');
    }
}
