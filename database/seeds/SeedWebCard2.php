<?php

use Illuminate\Database\Seeder;
use App\WebCard2;
class SeedWebCard2 extends Seeder
{
    public function run()
    {
        $data=array(
            [
                'title'=>'Scholarship',
                'subtitle'=>'Available'
            ],
            [
                'title'=>'Scholarship',
                'subtitle'=>'Available'
            ],
            [
                'title'=>'Scholarship',
                'subtitle'=>'Available'
            ],
        );
        WebCard2::insert($data);
    }
}
