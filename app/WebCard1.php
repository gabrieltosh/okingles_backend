<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebCard1 extends Model
{
    protected $table='web_card1s';
    protected $fillable=[
        'title',
        'subtitle',
        'icon',
        'color'
    ];
}
