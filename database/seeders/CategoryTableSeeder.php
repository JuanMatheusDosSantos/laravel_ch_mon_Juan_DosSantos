<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("set foreign_key_checks=0;");
        DB::table("categories")->truncate();
        DB::statement("ALTER TABLE categories AUTO_INCREMENT = 1;");
        DB::table("categories")->insert([
            "id"=>1,
            "name"=>"animales",
            "description"=>"animales"
        ]);
        DB::statement("set foreign_key_checks=1");
    }
}
