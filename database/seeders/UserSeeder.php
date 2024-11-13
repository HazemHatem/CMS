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
            "email" => "hhazm6745@gmail.com",
            "password" => "Hazem@2005",
            "phone" => "01092492013",
            "role_id" => 4
        ]);
    }
}
