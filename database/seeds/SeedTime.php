<?php

use Illuminate\Database\Seeder;
use App\Time;
use Carbon\Carbon;
class SeedTime extends Seeder
{
    public function run()
    {
        $data=array(
            [
                'name'=>'7:30 a 8:30',
                'start'=>'7:30',
                'end'=>'8:30',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'8:30 a 9:30',
                'start'=>'8:30',
                'end'=>'9:30',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'9:30 a 10:30',
                'start'=>'9:30',
                'end'=>'10:30',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'10:30 a 11:30',
                'start'=>'10:30',
                'end'=>'11:30',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'15:00 a 16:00',
                'start'=>'15:00',
                'end'=>'16:00',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'16:00 a 17:00',
                'start'=>'16:00',
                'end'=>'17:00',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'17:00 a 18:00',
                'start'=>'17:00',
                'end'=>'18:00',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'18:00 a 19:00',
                'start'=>'18:00',
                'end'=>'19:00',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'19:00 a 20:00',
                'start'=>'19:00',
                'end'=>'20:00',
                'created_at'=>Carbon::now()
            ]
        );
        Time::insert($data);
    }
}
