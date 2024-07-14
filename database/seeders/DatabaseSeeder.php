<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles and other initial data
        $this->call([
            RoleSeeder::class,
            UserSeeder::class, // Ensure this is included
            // Other seeders...
        ]);

        // Call additional seeders if needed
        $this->call([
            PostsTableSeeder::class,
            CarousellsTableSeeder::class,
            GalleriesTableSeeder::class,
            // Other seeders...
        ]);
    }
}