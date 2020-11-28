<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialLink extends Model
{
    protected $table='material_links';
    protected $fillable=[
        'title',
        'link',
        'material_id'
    ];
    public function material(){
        return $this->belongsTo(Material::class,'material_id');
    }
}
