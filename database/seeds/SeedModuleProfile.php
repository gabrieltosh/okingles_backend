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
        );
        ProfileModule::insert($data);
    }
}
