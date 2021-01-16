<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';
    protected $fillable=[
        'description',
        'file_name',
        'score',
        'user_id',
        'schedule_id',
    ];
}
