<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                "title" => 'Элеон',
                "description" => '-',
                "poster_url" => 'hotel-1.jpg',
                "address" => fake()->address,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'Суадг',
                "description" => '-',
                "poster_url" => 'hotel-2.jpg',
                "address" => fake()->address,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'Хетумзх',
                "description" => '-',
                "poster_url" => 'hotel-3.jpg',
                "address" => fake()->address,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'Дасибаду',
                "description" => '-',
                "poster_url" => 'hotel-4.jpg',
                "address" => fake()->address,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'Пемавиузо',
                "description" => '-',
                "poster_url" => 'hotel-5.jpg',
                "address" => fake()->address,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'Гибехуубос',
                "description" => '-',
                "poster_url" => 'hotel-6.jpg',
                "address" => fake()->address,
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ]);
    }
}
