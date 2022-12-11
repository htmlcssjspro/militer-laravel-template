<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory()->create([
            'nickname' => 'MILITER_S',
            'account_id' => '4092159',
            'access_token' => 'ec362efad54113aac3df1164df090afce10a152f',
            'expires_at' => '2022-09-12 05:44:19',

            'name' => 'MILITER',
            'first_name' => 'Сергей',
            'last_name' => 'MILITER',
            'email' => 'militer@htmlcssjs.pro',

            // 'password' => '$2y$10$SLBxS1Umf0IG4Vwq.R8ZwuTJFknXp2ZKduTNutXs6h/zmztMWQFey', // qwerty,
        ]);

        User::factory()->create([
            'nickname' => '_smotry_2005',
            'account_id' => '153116526',
            'access_token' => 'cb0055b77733d72b760a8dd7cb6a77d197b6d257',
            'expires_at' => '2022-09-06 17:03:01',

            'name' => 'ModDeveloper',
        ]);

        User::factory()->create([
            'nickname' => 'SeGaTGK',
            'account_id' => '20109666',
            'access_token' => '11d15896a9ffa7d473d12ad4c12572e8263b372b',
            'expires_at' => '2022-09-07 15:02:47',

            'name' => 'Owner',
        ]);

        User::factory(10)->create();
    }
}
