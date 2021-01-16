<?php

use Illuminate\Database\Seeder;
use App\ProfileModule;
use Carbon\Carbon;
class SeedModuleProfile extends Seeder
{
    public function run()
    {
        $data=array(
            [
                'profile_id'=>1,
                'module_id'=>1,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>3,
                'module_id'=>1,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>2,
                'module_id'=>1,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>2,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>3,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>4,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>5,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>6,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>7,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>8,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>9,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>10,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>17,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>18,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>1,
                'module_id'=>19,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            //docente
            [
                'profile_id'=>2,
                'module_id'=>14,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>2,
                'module_id'=>15,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>2,
                'module_id'=>16,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            //estudiantes
            [
                'profile_id'=>3,
                'module_id'=>12,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'profile_id'=>3,
                'module_id'=>13,
                'create'=>1,
                'edit'=>1,
                'delete'=>1,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        );
        ProfileModule::insert($data);
    }
}
