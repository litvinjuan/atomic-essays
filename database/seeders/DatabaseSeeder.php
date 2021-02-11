<?php

namespace Database\Seeders;

use App\Models\Essay;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()
             ->has(
                 Essay::factory()->count(10),
             )
             ->create([
                 'email' => 'litvinjuan@gmail.com',
                 'password' => Hash::make('secret'),
             ]);
    }
}
