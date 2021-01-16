<?php

use Illuminate\Database\Seeder;
use App\Module;
use Carbon\Carbon;
class SeedModule extends Seeder
{

    public function run()
    {
        $data=array(
            [
                'name'=>'Inicio',
                'route'=>'/panel',
                'sub_module'=>null,
                'icon'=>'eva-home-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Administración',
                'route'=>null,
                'sub_module'=>null,
                'icon'=>'eva-grid-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Usuarios',
                'route'=>null,
                'sub_module'=>null,
                'icon'=>'eva-people-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Perfiles',
                'route'=>'/panel/profile/list',
                'sub_module'=>2,
                'icon'=>'eva-credit-card-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Sucursales',
                'route'=>'/panel/branchoffice/list',
                'sub_module'=>2,
                'icon'=>'eva-briefcase-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name'=>'Modulos',
                'route'=>'/panel/module/list',
                'sub_module'=>2,
                'icon'=>'eva-copy-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Aulas',
                'route'=>'/panel/classroom/list',
                'sub_module'=>2,
                'icon'=>'eva-layers-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Lecciones',
                'route'=>'/panel/lesson/list',
                'sub_module'=>2,
                'icon'=>'eva-file-text-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Horas',
                'route'=>'/panel/time/list',
                'sub_module'=>2,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Centralizador Horarios ',
                'route'=>'/panel/week/branchoffice',
                'sub_module'=>2,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            //10
            [
                'name'=>'Habilidades',
                'route'=>'/panel/skill/list',
                'sub_module'=>2,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Reservar Clases',
                'route'=>'/panel/student/reservation/days',
                'sub_module'=>null,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Mis Clases',
                'route'=>'/panel/student/myclass/schedules',
                'sub_module'=>null,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Horarios Docente',
                'route'=>'/panel/teacher/myschedules/days',
                'sub_module'=>null,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Cuestionarios',
                'route'=>'/panel/teacher/questionnaires/list',
                'sub_module'=>null,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Materiales',
                'route'=>'/panel/teacher/materials/list',
                'sub_module'=>null,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Estudiantes',
                'route'=>'/panel/user/student/list',
                'sub_module'=>3,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Docentes',
                'route'=>'/panel/user/teacher/list',
                'sub_module'=>3,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Administrativos',
                'route'=>'/panel/user/admin/list',
                'sub_module'=>3,
                'icon'=>'eva-clock-outline',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        Module::insert($data);
    }
}
