<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Hash;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'occupation',
        'ci',
        'email_verified_at',
        'status',
        'birthdate',
        'due_date',
        'phone',
        'type',
        'invoice',
        'address',
        'registter',
        'image',
        'branch_office_id',
        'profile_id',
        'password',
    ];
    protected $appends = ['taken','skill','percentage','absent'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function branch_office(){
        return $this->belongsTo(BranchOffice::class,'branch_office_id');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function assignment_student(){
       return $this->hasMany(AssignmentStudent::class,'student_id');
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }
    public function getTakenAttribute()
    {
        if($this->type=='Estudiante'){
            return AssignmentStudent::where('student_id',$this->id)->where('skills_id','!=',null)->count();
        }else{
            return "No es Estudiante";
        }
    }
    public function getSkillAttribute()
    {
        if($this->type=='Estudiante'){
            $skills=DB::table('assignment_students')
                        ->join('skills','skills.id','=','assignment_students.skills_id')
                        ->select('skills.name',DB::raw('COUNT(assignment_students.skills_id) as total'))
                        ->where('assignment_students.student_id',$this->id)
                        ->groupBy('skills.name')
                        ->get();
            $skill='';
            $higher=0;
            foreach ($skills as $key => $value) {
                if($value->total>$higher){
                    $higher=$value->total;
                    $skill=$value->name;
                }
            }
            return $skill;
        }else{
            return "No es Estudiante";
        }
    }
    public function getPercentageAttribute()
    {
        if($this->type=='Estudiante'){
           $percentages=AssignmentStudent::select('percentage')->where('student_id',$this->id)->where('percentage','>',0)->get();
           $sum=0;
           $count=0;
           foreach ($percentages as $key => $value) {
               $sum+=$value->percentage;
               $count++;
           }
           if($count!='0'){
                return number_format($sum/$count,2)." %";
           }else{
                return "0 %";
           }
        }else{
            return "No es Estudiante";
        }
    }
    public function getAbsentAttribute(){
        if($this->type=='Estudiante'){
            return AssignmentStudent::where('student_id',$this->id)->where('absent','=',1)->count();
        }else{
            return "No es Estudiante";
        }
    }
}
