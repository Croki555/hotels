<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                "hotel_id"=> 1,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-1.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 1,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-2.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 2,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-3.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 2,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-4.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 3,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-5.webp',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 3,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-6.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 4,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-7.webp',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 4,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-8.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 5,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-9.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 5,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-10.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 6,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-11.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "hotel_id"=> 6,
                "title" => strtoupper(fake()->word()),
                "description" => '-',
                "floor_area"=> fake()->randomFloat(1, 5, 10),
                "type"=> 'личная комната',
                "price"=> fake()->numberBetween(2000, 7000),
                "poster_url" => 'room-12.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
