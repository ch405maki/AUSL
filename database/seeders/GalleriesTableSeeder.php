<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galleries')->insert([
            [
                'title' => 'Graduation Ceremony',
                'year' => '2023',
                'images' => json_encode([
                    'https://via.placeholder.com/150?text=Graduation+Image+1',
                    'https://via.placeholder.com/150?text=Graduation+Image+2',
                    'https://via.placeholder.com/150?text=Graduation+Image+3',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Law School Events',
                'year' => '2022',
                'images' => json_encode([
                    'https://via.placeholder.com/150?text=Event+Image+1',
                    'https://via.placeholder.com/150?text=Event+Image+2',
                    'https://via.placeholder.com/150?text=Event+Image+3',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Community Outreach',
                'year' => '2021',
                'images' => json_encode([
                    'https://via.placeholder.com/150?text=Outreach+Image+1',
                    'https://via.placeholder.com/150?text=Outreach+Image+2',
                    'https://via.placeholder.com/150?text=Outreach+Image+3',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}