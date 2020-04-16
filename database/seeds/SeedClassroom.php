<?php

use Illuminate\Database\Seeder;
use App\Classroom;
use Carbon\Carbon;
class SeedClassroom extends Seeder
{

    public function run()
    {
        $data=array(
            [
                'name'=>'Aula 1',
                'branch_office_id'=>1,
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'Aula 2',
                'branch_office_id'=>1,
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'Aula 3',
                'branch_office_id'=>1,
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'Aula 4',
                'branch_office_id'=>1,
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'Aula 5',
                'branch_office_id'=>1,
                'created_at'=>Carbon::now()
            ]
        );
        Classroom::insert($data);
    }
}
