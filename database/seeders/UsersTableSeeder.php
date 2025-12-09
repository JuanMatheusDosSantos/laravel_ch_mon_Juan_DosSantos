<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table("users")->truncate();
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");

        DB::table("users")->insert([
            [
                "id" => 1,
                "name" => "admin",
                "email" => "admin@gmail.com",
                "password" => bcrypt("12345678"),
                "admin" => true,
            ],
            [
                "id" => 2,
                "name" => "prueba",
                "email" => "prueba@prueba.com",
                "password" => bcrypt("12345678"),
                "admin" => false,
            ],
            [
                "id" => 3,
                "name" => "Cristina",
                "email" => "profe@gmail.com",
                "password" => bcrypt("12345678"),
                "admin" => false,
            ],
            [
                "id" => 4,
                "name" => "Cristian",
                "email" => "cristian@gmail.com",
                "password" => bcrypt("12345678"),
                "admin" => false,
            ],
            [
                "id" => 5,
                "name" => "Juan",
                "email" => "juan@gmail.com",
                "password" => bcrypt("12345678"),
                "admin" => false,
            ],
            [
                "id" => 6,
                "name" => "Laura",
                "email" => "laura@gmail.com",
                "password" => bcrypt("12345678"),
                "admin" => false,
            ]
        ]);


        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
    }
}
