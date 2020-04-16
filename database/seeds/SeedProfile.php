<?php

use Illuminate\Database\Seeder;
use App\Profile;
use Carbon\Carbon;
class SeedProfile extends Seeder
{
    public function run()
    {
        $data=array(
            [
                'name'=>'Administrador',
                'description'=>'Rol de Administrador',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Docente',
                'description'=>'Rol Docente',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Estudiante',
                'description'=>'Rol Estudiante',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        Profile::insert($data);
    }
}
