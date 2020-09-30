<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebCard2 extends Model
{
    protected $table='web_card2s';
    protected $fillable=[
        'title',
        'subtitle',
    ];
}
