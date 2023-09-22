<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\BrgyOfficial::create([
        //     'display_img' => 'image.png',
        //     'lname' => fake()->name(),
        //     'fname' => fake()->name(),
        //     'mname' => fake()->name(),
        //     'sname' => fake()->name(),
        //     'zone' => 1,
        //     'gender' => 'male',
        //     'contact' => fake()->e164PhoneNumber(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'civil_status' => 'single',
        //     'bday' => fake()->date($format = 'Y-m-d', $max = 'now'),
        //     'position' => 'kagawad',
        // ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin::insert([
        //     'email' => 'admin@sample.com',
        //     'username' => 'admin',
        //     'password' => Hash::make('123456'),
        // ]);

        // User::insert([
        //     'email' => 'resident@sample.com',
        //     'username' => 'resident',
        //     'password' => Hash::make('123456'),
        // ]);
    }
}
