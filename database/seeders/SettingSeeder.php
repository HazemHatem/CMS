<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'CMS'],
            ['key' => 'site_email', 'value' => 'hhazm6745@gmail.com'],
            ['key' => 'default_language', 'value' => 'en'],
            ['key' => 'maintenance_mode', 'value' => 'false'],
        ];
        Setting::insert($settings);
    }
}
