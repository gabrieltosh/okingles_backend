<?php

use Illuminate\Database\Seeder;
use App\BranchOffice;
use Carbon\Carbon;
class SeedBranchOffice extends Seeder
{
    public function run()
    {
        $data=array(
            [
                'name'=>'Ok Aprende Ingles La Paz',
                'city'=>'La Paz',
                'address'=>'Av.6 de Agosto Campos y, Gosálvez, La Paz',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Ok Aprende Ingles Cochabamba',
                'city'=>'Cochabamba',
                'address'=>'Av.6 de Agosto Campos y, Gosálvez, La Paz',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Ok Aprende Ingles Santa Cruz',
                'city'=>'Santa Cruz',
                'address'=>'Av.6 de Agosto Campos y, Gosálvez, La Paz',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=>'Ok Aprende Ingles El Alto',
                'city'=>'La Paz',
                'address'=>'Av.6 de Agosto Campos y, Gosálvez, La Paz',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ],
        );
        BranchOffice::insert($data);
    }
}
