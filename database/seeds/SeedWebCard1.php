<?php

use Illuminate\Database\Seeder;
use App\WebCard1;
class SeedWebCard1 extends Seeder
{

    public function run()
    {
        $data=array(
            [
                'title'=>'Scholarship',
                'subtitle'=>'Available',
                'icon'=>'far fa-bookmark fa-xs',
                'color'=>'#ff7171'
            ],
            [
                'title'=>'Scholarship',
                'subtitle'=>'Available',
                'icon'=>'far fa-bookmark fa-xs',
                'color'=>'#ff7171'
            ],
            [
                'title'=>'Scholarship',
                'subtitle'=>'Available',
                'icon'=>'far fa-bookmark fa-xs',
                'color'=>'#ff7171'
            ],
        );
        WebCard1::insert($data);
    }
}
