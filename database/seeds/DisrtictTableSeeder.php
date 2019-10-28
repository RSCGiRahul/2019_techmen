<?php

use Illuminate\Database\Seeder;
use App\Models\District;
class DisrtictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districtData = array(
            ['state_id' => 1 , 'name' => 'Delhi'],
            ['state_id' => 2 , 'name' => 'Noida'],
            ['state_id' => 3 , 'name' => 'Gurugram'],
            ['state_id' => 2 , 'name' => 'Ghaziabad'],
            ['state_id' => 4 , 'name' => 'Other'],

        );
        foreach($districtData as $district){
            District::firstOrCreate([
                'name' => $district['name'],
            ],[
                'state_id' => $district['state_id'],
                'name' => $district['name']
            ]);

        }

    }
}
