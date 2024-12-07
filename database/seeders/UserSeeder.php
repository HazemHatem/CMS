<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Hazem Hatem",
            "email" => "admin@email.com",
            "password" => "Aa@11111",
            "image"=>"https://th.bing.com/th/id/R.36a637acd327c76357628dca25f838de?rik=KEv28AfFiyqYjA&pid=ImgRaw&r=0",
            "phone" => "01092492013",
            "rule_id" => 1
        ]);

        User::factory()->count(10)->create();

        User::factory()
            ->count(5)
            ->admin()
            ->create();

        User::factory()
            ->count(10)
            ->author()
            ->create();
    }
}
