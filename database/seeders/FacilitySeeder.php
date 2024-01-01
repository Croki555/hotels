<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facilities')->insert([
            [
                "title" => 'уборка номеров',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'бассейн',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'смена белья',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'доступ в интернет',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'бесплатный завтрак',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'баня',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'фитнес-зал',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'охраняемая автомобильная стоянка',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'экскурсии',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'бар-ресторан',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'игровые залы',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'микроволновка',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'холодильник',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'балкон',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => 'санузел',
                "created_at" => now(),
                "updated_at" => now(),
            ],

        ]);
    }
}
