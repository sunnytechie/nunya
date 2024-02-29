<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //clear the table
        Setting::truncate();

        //insert data
        Setting::create([
            'email' => '',
            'email_2' => '',
            'phone' => '',
            'phone_2' => '',
            'address' => '',
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'paystack_test_public_key' => '',
            'paystack_test_secret_key' => '',
            'paystack_live_public_key' => '',
            'paystack_live_secret_key' => '',
        ]);
    }
}
