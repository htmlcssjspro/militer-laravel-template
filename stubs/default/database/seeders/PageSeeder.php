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
            'view' => 'pages.home.home',
            'meta_title' => 'Home Page',
            'meta_description' => 'Home Page Description',
            'title' => 'Заголовок Домашней страницы',
        ]);

        Page::factory()->create([
            'name' => 'login',
            'slug' => 'login',
            'view' => 'pages.login.login',
            'meta_title' => 'Login Page',
            'meta_description' => 'Login Page Description',
            'title' => 'Login',
        ]);

        Page::factory()->create([
            'name' => 'faq',
            'slug' => 'faq',
            'view' => 'pages.faq.faq',
            'meta_title' => 'FAQ',
            'meta_description' => 'FAQ Description',
            'title' => 'Часто задаваемые вопросы',
        ]);

        Page::factory()->create([
            'name' => 'contacts',
            'slug' => 'contacts',
            'view' => 'pages.contacts.contacts',
            'meta_title' => 'Contacts',
            'meta_description' => 'Contacts Description',
            'title' => 'Контакты',
        ]);

        Page::factory()->create([
            'name' => 'profile',
            'prefix' => 'user',
            'slug' => 'profile',
            'view' => 'user.profile.profile',
            'meta_title' => 'Личный кабинет',
            'meta_description' => 'User Description',
            'title' => 'Личный кабинет',
        ]);

        Page::factory()->create([
            'name' => 'dashboard',
            'prefix' => 'admin',
            'slug' => 'dashboard',
            'view' => 'admin.dashboard.dashboard',
            'meta_title' => 'Dashboard',
            'meta_description' => 'Dashboard Description',
            'title' => 'Панель администратора',
        ]);

        Page::factory()->create([
            'name' => 'login',
            'prefix' => 'admin',
            'slug' => 'login',
            'view' => 'admin.login.login',
            'meta_title' => 'Login',
            'meta_description' => 'Login Description',
            'title' => 'Login',
        ]);
    }
}
