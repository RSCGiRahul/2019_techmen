<?php

use Illuminate\Database\Seeder;
use App\Models\Diagnose;
class DiagnoseTableSeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$allData = $this->getAll();
		foreach($allData as $valuess){
		 foreach(explode(',',$valuess) as $value){	
					Diagnose::firstOrCreate(
						[
							'name' => trim($value),
						],
						[
							'name' => trim($value),
						],
					);
				}
		}
    }

    private function getAll()
    {
    	return [
				 'Screen Replacement,
					battery ,
					other,
					battery,
					charging,
					Home button,
					mic,
					Headphone,
					speaker,
					sensor strip/front camera,
					Volume/power button,
					Service charge ,
					cabinet ,
					Fault,
					Back glass,
					Front Camera,Cabinet'
				];
    }
}
