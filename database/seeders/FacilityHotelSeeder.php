<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facility_hotel')->insert([
           [
               "facilitie_id"=> 8,
               "hotel_id" => 1,
               "created_at" => now(),
               "updated_at" => now(),
           ],
            [
                "facilitie_id"=> 10,
                "hotel_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 2,
                "hotel_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 6,
                "hotel_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 10,
                "hotel_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 8,
                "hotel_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 2,
                "hotel_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 6,
                "hotel_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 10,
                "hotel_id" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 8,
                "hotel_id" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 2,
                "hotel_id" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 6,
                "hotel_id" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 10,
                "hotel_id" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 8,
                "hotel_id" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 2,
                "hotel_id" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 6,
                "hotel_id" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 10,
                "hotel_id" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 8,
                "hotel_id" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 2,
                "hotel_id" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 6,
                "hotel_id" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 10,
                "hotel_id" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 8,
                "hotel_id" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 2,
                "hotel_id" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "facilitie_id"=> 6,
                "hotel_id" => 6,
                "created_at" => now(),
                "updated_at" => now(),
            ],

        ]);
    }
}
