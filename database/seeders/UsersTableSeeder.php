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
        DB::statement("set foreign_key_checks=0;");
        DB::table("users")->truncate();
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");
        DB::table("users")->insert([
            "id"=>1,
            "name"=>"admin",
            "email"=>"admin@gmial.com",
            "password"=>bcrypt("12345678")
        ]);
        DB::table("users")->insert([
            "id"=>2,
            "name"=>"prueba",
            "email"=>"prueba@prueba.com",
            "password"=>bcrypt("12345678")
        ]);
        DB::statement("set foreign_key_checks=1");
    }
}
