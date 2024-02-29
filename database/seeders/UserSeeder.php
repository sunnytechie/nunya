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
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@greaternunya.org';
        $admin->password = bcrypt('admin2024');
        $admin->email_verified_at = now();
        $admin->role = 'admin';
        $admin->save();
    }
}
