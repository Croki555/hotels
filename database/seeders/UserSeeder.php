<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "role_id" => 1,
                "name" => 'Pavel',
                "email" => 'sokolov.pavlik28@gmail.com',
                "password" => '$2y$12$gxgTvyZ8BvRS5y/OTTpA6etM3.UuW/FN2oVdH0qFCpap6/jcUj5pi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "role_id" => 2,
                "name" => 'Admin',
                "email" => 'admin@example.com',
                "password" => '$2y$12$PRFMts20rAxImBQZbH8wUuA7lqoAA8ZPhzIDhBA1RgfF9ny3cEjhe',
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
