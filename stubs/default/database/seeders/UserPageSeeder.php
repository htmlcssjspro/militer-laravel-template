<?php

namespace Database\Seeders;

use App\Models\UserPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserPage::factory()->create([
            'name' => 'user_profile',
            'slug' => 'profile',
            'view' => 'user.profile',
            'meta_title' => 'Личный кабинет',
            'meta_description' => 'User Description',
            'title' => 'Личный кабинет',
        ]);
        UserPage::factory()->create([
            'name' => 'user_buy_gold',
            'slug' => 'buy-gold',
            'view' => 'user.buy-gold',
            'meta_title' => 'Купить iGold',
            'meta_description' => 'Купить iGold Description',
            'title' => 'Купить iGold',
        ]);
        UserPage::factory()->create([
            'name' => 'user_buy_gold_confirmation',
            'slug' => 'buy-gold-confirmation',
            'view' => 'user.buy-gold-confirmation',
            'meta_title' => 'Оформление Покупки',
            'meta_description' => 'Оформление Покупки Description',
            'title' => 'Оформление Покупки',
        ]);
        UserPage::factory()->create([
            'name' => 'user_withdrawal',
            'slug' => 'withdrawal',
            'view' => 'user.withdrawal',
            'meta_title' => 'Вывод средств',
            'meta_description' => 'Вывод средств Description',
            'title' => 'Вывод средств',
        ]);
    }
}
