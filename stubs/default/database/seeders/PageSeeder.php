<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::factory()->create([
            'name' => 'home',
            'slug' => 'home',
            'view' => 'pages.home',
            'meta_title' => 'Home Page',
            'meta_description' => 'Home Page Description',
            'title' => 'Заголовок Домашней страницы',
        ]);

        Page::factory()->create([
            'name' => 'rating',
            'slug' => 'rating',
            'view' => 'pages.rating',
            'meta_title' => 'Rating',
            'meta_description' => 'Rating Description',
            'title' => 'Рейтинг игроков',
        ]);

        Page::factory()->create([
            'name' => 'instructions',
            'slug' => 'instructions',
            'view' => 'pages.instructions',
            'meta_title' => 'Instructions',
            'meta_description' => 'Instructions Description',
            'title' => 'Инструкции для игроков',
        ]);

        Page::factory()->create([
            'name' => 'faq',
            'slug' => 'faq',
            'view' => 'pages.faq',
            'meta_title' => 'FAQ',
            'meta_description' => 'FAQ Description',
            'title' => 'Часто задаваемые вопросы',
        ]);

        Page::factory()->create([
            'name' => 'referral',
            'slug' => 'referral',
            'view' => 'pages.referral',
            'meta_title' => 'Referral',
            'meta_description' => 'Referral Description',
            'title' => 'Реферальная программа',
        ]);
        Page::factory()->create([
            'name' => 'referral-players',
            'slug' => 'referral_for_players',
            'view' => 'pages.referral.players',
            'meta_title' => 'Referral',
            'meta_description' => 'Referral Description',
            'title' => 'Реферальная программа для игроков',
        ]);
        Page::factory()->create([
            'name' => 'referral-developers',
            'slug' => 'referral_for_developers',
            'view' => 'pages.referral.developers',
            'meta_title' => 'Referral',
            'meta_description' => 'Referral Description',
            'title' => 'Реферальная программа для вебмастеров',
        ]);
    }
}
