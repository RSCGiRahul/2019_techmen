<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminRoleSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(DisrtictTableSeeder::class);
        // $this->call(DiagnoseTableSeeding::class);
        $this->call(GadgetTableSeeder::class);
        // $this->call(BrandTableSeeding::class);
        $this->call(RoleSeeder::class);
        $this->call(RegionSeeder::class);
    }
}
