<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table='classrooms';

    protected $fillable=[
        'name',
        'branch_office_id'
    ];
    public function branch_office(){
       return $this->belongsTo(BranchOffice::class);
    }
}
