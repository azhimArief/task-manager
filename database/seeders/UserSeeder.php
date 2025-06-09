<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! User::where('email', 'admin@test.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin Tester',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
