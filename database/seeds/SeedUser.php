<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
class SeedUser extends Seeder
{
    public function run()
    {
        $data=array(
            [
                'name'=>'Gabriel Angel', 
                'lastname'=>'Pinto',
                'email'=>'gpinto.personal@gmail.com', 
                'occupation'=>'Ingeniero en Sistemas',
                'ci'=>'13149840',
                'email_verified_at'=>1,
                'status'=>'1',
                'birthdate'=>'2020/03/05',
                'due_date'=>'2020/03/05',
                'phone'=>'76518845',
                'invoice'=>'112763',
                'address'=>'AV.san Vicente Nro. 2005 Z. C. de Carangas-Tilata',
                'registter'=>'5664SAD',
                'image'=>'img_5e6060b285da9152012.jpg',
                'branch_office_id'=>'1',
                'type'=>'Administrativo',
                'profile_id'=>'1',
                'password'=>bcrypt('123456'),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Yerko', 
                'lastname'=>'Pinto',
                'email'=>'ypinto.personal@gmail.com', 
                'occupation'=>'Docente',
                'ci'=>'1369751',
                'email_verified_at'=>1,
                'status'=>'1',
                'birthdate'=>'2020/03/05',
                'due_date'=>'2020/03/05',
                'phone'=>'60133971',
                'invoice'=>'4548656',
                'address'=>'AV.san Vicente Nro. 2005 Z. C. de Carangas-Tilata',
                'registter'=>'5664SAD',
                'image'=>'img_5e6060b285da9152012.jpg',
                'branch_office_id'=>'1',
                'type'=>'Docente',
                'profile_id'=>'2',
                'password'=>bcrypt('123456'),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Joel', 
                'lastname'=>'Pinto',
                'email'=>'jpinto.personal@gmail.com', 
                'occupation'=>'Estudiante',
                'ci'=>'5697238',
                'email_verified_at'=>1,
                'status'=>'1',
                'birthdate'=>'2020/03/05',
                'due_date'=>'2020/03/05',
                'phone'=>'76518845',
                'invoice'=>'12145843',
                'address'=>'AV.san Vicente Nro. 2005 Z. C. de Carangas-Tilata',
                'registter'=>'5664SAD',
                'image'=>'img_5e6060b285da9152012.jpg',
                'branch_office_id'=>'1',
                'type'=>'Estudiante',
                'profile_id'=>'3',
                'password'=>bcrypt('123456'),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Yola', 
                'lastname'=>'Cutili',
                'email'=>'ycutili.personal@gmail.com', 
                'occupation'=>'Estudiante',
                'ci'=>'7365984',
                'email_verified_at'=>1,
                'status'=>'1',
                'birthdate'=>'2020/03/05',
                'due_date'=>'2020/03/05',
                'phone'=>'76518845',
                'invoice'=>'6982457',
                'address'=>'AV.san Vicente Nro. 2005 Z. C. de Carangas-Tilata',
                'registter'=>'54664SAD',
                'image'=>'img_5e6060b285da9152012.jpg',
                'branch_office_id'=>'1',
                'type'=>'Estudiante',
                'profile_id'=>'3',
                'password'=>bcrypt('123456'),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        User::insert($data);
    }
}
