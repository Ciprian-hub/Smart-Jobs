<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *  php artisan db:seed - populate with fake users
     * php artisan migrate:refresh - clear fake users
     */
    public function run(): void
    {
        $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
         ]);

        Job::factory(5)->create([
            'user_id' => $user->id
        ]);

//         \App\Models\User::factory(5)->create();

//         \App\Models\User::factory(4)->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

//        Job::create([
//            'title' => 'Software dev',
//            'tags' => 'laravel, javascript',
//            'company' => 'RTD Corp',
//            'location' => 'Texas, Ua',
//            'email' => 'rtd@email.com',
//            'web' => 'https://www.rtd.com',
//            'description' => 'These routes are loaded by the RouteServiceProvider and all of them will Here is where you can register web routes for your application.'
//        ]);
//
//        Job::create([
//            'title' => 'Hardware engineer',
//            'tags' => 'electronics, controllers',
//            'company' => 'ELECR',
//            'location' => 'Amsterdam, Ua',
//            'email' => 'elcr@email.com',
//            'web' => 'https://www.elcr.com',
//            'description' => 'These routes are loaded by the RouteServiceProvider and all of them will Here is where you can register web routes for your application.'
//        ]);
    }
}
