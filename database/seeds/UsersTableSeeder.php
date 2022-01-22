<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Administrator',
            'lastname' => 'Administrator',
            'libraryId' => '111111',
            'matricno' => 'admin',
            'email' => 'admin@digitalib.com',
            'phone' => '11111111111',
            'nationalId' => '11111111',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('admin');
    }
}
