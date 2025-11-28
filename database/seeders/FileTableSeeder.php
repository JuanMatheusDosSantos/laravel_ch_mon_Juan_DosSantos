<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("set foreign_key_checks=0;");
        DB::table("files")->truncate();
        DB::statement("ALTER TABLE files AUTO_INCREMENT = 1;");
        DB::table("files")->insert([
            "id"=>1,
            "file_path"=>"tabibito.jpg",
            "petition_id"=>1
        ]);
        DB::statement("set foreign_key_checks=1");
    }
}
