<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles= [
            ['name' => 'Admin', 'display_name' => 'Admin'],
            ['name' =>'Manager', 'display_name' => 'Manager'],
            ['name'=>'Human Resource','display_name' => 'HR'],
            ['name'=>'Executive', 'display_name' => 'Executive'],
            ['name'=>'Technician', 'display_name' => 'Technician']
        ];
        foreach($roles as $role){

            Role::firstOrCreate(
                [
                    'name' => $role['name'],
                ],
            [
                'name' => $role['name'],
                'display_name' => $role['display_name']
            ]
            );
        }
        
    }
}
