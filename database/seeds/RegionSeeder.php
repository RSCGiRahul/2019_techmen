<?php

use Illuminate\Database\Seeder;
Use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $datas = ['Delhi','Noida','Gurugram','Ghaziabad','Other City'];
        foreach($datas as $data){

        Region::firstOrCreate([
                        'name' =>$data
                    ],
                    [
                        'name' => $data,
                        'pincode' => '12345'
                    ]
                );
        }
    }
}
