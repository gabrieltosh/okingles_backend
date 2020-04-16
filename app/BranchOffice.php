<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchOffice extends Model
{
    use SoftDeletes;
    protected $table='branch_offices';
    protected $fillable=[
        'name',
        'city',
        'address',
    ];
}
