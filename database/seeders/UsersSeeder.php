<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'Le Stylish',
            'email' => 'admin@stylish.com',
            'password' => bcrypt('lestylish'),
            'isAdmin' => 1
        ]);
    }
}
