<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //clear the table
        About::truncate();

        //insert data
        About::create([
            'about_igwe' => 'Our Igwe is the custodian of our culture and history, bringing direction and counsel when needed. He s the symbol of how far we have come as a people.',
            'about_us' => 'Every indigene of NAC shall belong to either the AGE GRADE System or the WOMEN GUILD.',
            'about_values' => 'We shall uphold honesty, integrity and pragmatism, and recognize and celebrate...',
        ]);

    }
}
