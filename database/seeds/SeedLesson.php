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
                'name'=>'Essential 6-10',
                'description'=>'Essential 6-10',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Essential 11-15',
                'description'=>'Essential 11-15',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Essential 16-20',
                'description'=>'Essential 16-20',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Essential 21-25',
                'description'=>'Essential 21-25',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Working 1-5',
                'description'=>'Essential 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Working 6-10',
                'description'=>'Essential 6-10',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Working 11-15',
                'description'=>'Essential 11-15',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Working 16-20',
                'description'=>'Essential 16-20',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Working 21-25',
                'description'=>'Essential 21-25',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speak Out 1-5',
                'description'=>'Essential 1-5',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speak Out 6-10',
                'description'=>'Essential 6-10',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speak Out 11-15',
                'description'=>'Essential 11-15',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speak Out 16-20',
                'description'=>'Essential 16-20',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Speak Out 21-25',
                'description'=>'Essential 21-25',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        );
        Lesson::insert($data);
    }
}
