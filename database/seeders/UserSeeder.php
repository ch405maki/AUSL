<?php

// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert a specific user with a generated UUID
        DB::table('users')->insert([
            'id' => Str::uuid()->toString(),
            'name' => 'Administrator',
            'email' => 'admin@itc.com',
            'role_id' => 3, // Assuming role ID 1 is for admins
            'password' => Hash::make('Password@123'), // Securely hash the password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
