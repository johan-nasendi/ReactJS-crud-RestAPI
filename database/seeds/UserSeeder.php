<?php

use Illuminate\Database\Seeder;
use App\User;
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
            'name' => 'Admin',
            'username' => 'johan_nasendi',
            'email' => 'rg@johan@gmail.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'username' => 'users_name',
            'email' => 'rg@user@hotmail.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
