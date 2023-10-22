<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\BarangayHealthWorker;
use App\Models\Chatbot;
use App\Models\ChatBotPattern;
use App\Models\ChatBotResponse;
use App\Models\ChatBotTag;
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

        // ChatBotTag::insert([
        //     'tag' => 'badwords',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'putang',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'putanginamo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'putangina',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'putang ina mo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'putang inamo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'putangina mo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'fuck',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'fucker',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'fucking',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'fuckin',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'fuck u',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'fuck you',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'taenamo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'taena mo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'taena',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'tanginamo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'puta',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'tangina mo',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'tangina',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'tang ina',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 1,
        //     'keyword' => 'ina mo',
        // ]);

        // ChatBotResponse::insert([
        //     'chat_bot_tag_id' => 1,
        //     'response' => "Please don't send unnecessary words :(.",
        // ]);

        // ChatBotResponse::insert([
        //     'chat_bot_tag_id' => 1,
        //     'response' => "We strive to maintain a respectful environment. Please refrain from using offensive words.",
        // ]);

        // ChatBotResponse::insert([
        //     'chat_bot_tag_id' => 1,
        //     'response' => "Oops! It seems you've used inappropriate language.",
        // ]);

        // ChatBotTag::insert([
        //     'tag' => 'jokes',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 3,
        //     'keyword' => 'joke',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 3,
        //     'keyword' => 'jokes',
        // ]);

        // ChatBotPattern::insert([
        //     'chat_bot_tag_id' => 3,
        //     'keyword' => 'funny',
        // ]);

        // ChatBotResponse::insert([
        //     'chat_bot_tag_id' => 3,
        //     'response' => "Si MC ay panot.",
        // ]);
    }
}
