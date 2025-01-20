<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Peserta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Admin::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'adminlkui@gmail.com',
        //     'password' => bcrypt('dinuspolke-123'),
        // ]);

        Admin::factory()->create([
            'name' => 'Admin 2',
            'email' => 'adminlkui2@gmail.com',
            'password' => bcrypt('udinus-123'),
        ]);

        Admin::factory()->create([
            'name' => 'Admin 3',
            'email' => 'adminlkui3@gmail.com',
            'password' => bcrypt('udinus1990'),
        ]);
    }
}
