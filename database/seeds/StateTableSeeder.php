<?php

use Illuminate\Database\Seeder;
Use App\Models\State;
class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stateData = ['Delhi','Uttar Pardesh','Haryana','Other'];
        foreach($stateData as $state){

        State::firstOrCreate([
                        'name' =>$state
                    ],
                    [
                        'name' => $state
                    ]
                );
        }
    }
}
