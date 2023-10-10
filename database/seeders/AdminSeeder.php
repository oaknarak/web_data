<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'adminOak',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin1234'),
            'Isadmin' => '1'
        ]);
        User::create([
            'name' => 'adminInk',
            'email' => 'adminInk@admin.com',
            'password' => bcrypt('admin1234'),
            'Isadmin' => '1'
        ]);
    }
}
