<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // User::create([
        //     'name' => 'transisi',
        //     'email' => 'admin@transisi.id',
        //     'password' => bcrypt('transisi'),
        // ]);
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('admin123'),
        // ]);

        // Company::create([
        //     'name' => 'Twitter',
        //     'email' => 'twitter@mail.com',
        //     'logo' => '',
        // ]);
        // Company::create([
        //     'name' => 'Facebook',
        //     'email' => 'facebook@mail.com',
        //     'logo' => '',
        // ]);
        // Company::create([
        //     'name' => 'Tiktok',
        //     'email' => 'tiktok@mail.com',
        //     'logo' => '',
        // ]);

        \App\Models\Employe::factory(200)->create();
    }
}
