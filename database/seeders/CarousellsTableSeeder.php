<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarousellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carousells')->insert([
            [
                'image' => 'https://via.placeholder.com/800x400?text=Carousel+Image+1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'https://via.placeholder.com/800x400?text=Carousel+Image+2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'https://via.placeholder.com/800x400?text=Carousel+Image+3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}