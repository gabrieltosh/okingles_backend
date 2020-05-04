<?php

use Illuminate\Database\Seeder;
use App\Skill;
use Carbon\Carbon;
class SeedSkills extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            [
                'name'=>'Listening',
                'description'=>'Listening',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speaking',
                'description'=>'Speaking',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Writing',
                'description'=>'Writing',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Reading',
                'description'=>'Reading',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        );
        Skill::insert($data);
    }
}
