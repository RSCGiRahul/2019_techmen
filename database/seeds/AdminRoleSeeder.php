<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  User::firstOrCreate([
            'id' => 1
        ],
        [
            'phone' => 21321221,
            'name' => 'Super Admin',
            'email' => 'techmen@gmail.com',
            'verified' => 1,
            'password' => bcrypt('123456'),
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
//       dd( $user );
        $user->roles()->attach(1);
    }
}
