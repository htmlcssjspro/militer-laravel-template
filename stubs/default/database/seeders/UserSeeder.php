<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'MILITER',
            'first_name' => 'Сергей',
            'last_name' => 'MILITER',
            'email' => 'militer@htmlcssjs.pro',
            'role' => 'developer',
            'email_verified_at' => now(),
            'password' => Hash::make('qwerty'),
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('qwerty'),
        ]);

        User::factory(10)->create();
    }
}
