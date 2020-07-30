<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=> 'Admin',
            'email' =>'admin@admin.com',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name'=> 'pengunjung',
            'email' =>'user@user.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('pengunjung');
    }
}
