<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Petition_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement("set foreign_key_checks=0;");
        DB::table("petition_user")->truncate();
        DB::statement("ALTER TABLE petition_user AUTO_INCREMENT = 1;");
        DB::table("petition_user")->insert([
            "petition_id"=>1,
            "user_id"=>1
        ]);
        DB::statement("set foreign_key_checks=1");

    }
}
