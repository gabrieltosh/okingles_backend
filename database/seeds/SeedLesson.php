<?php

use Illuminate\Database\Seeder;
use App\Lesson;
use Carbon\Carbon;
class SeedLesson extends Seeder
{
    public function run()
    {
        $data=array(
            [
                'name'=>'Essential 1-5',
                'description'=>'Essential 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Working 1-5',
                'description'=>'Essential 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speak Out 1-5',
                'description'=>'Essential 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Essential 5-10',
                'description'=>'Essential 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Working 5-10',
                'description'=>'Working 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speak Out 5-10',
                'description'=>'Speak Out 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        Lesson::insert($data);
    }
}
