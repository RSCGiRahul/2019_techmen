<?php

use Illuminate\Database\Seeder;
use App\Models\Gadget;
class GadgetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gadget::firstOrCreate(
            [
                'name' => 'Mobile'
            ],
            [
                'name' => 'Mobile'
            ],
        );
    }
}
