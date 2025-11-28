<?php

namespace Database\Seeders;

use App\Models\Petition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement("set foreign_key_checks=0;");
        DB::table("petitions")->truncate();
        DB::statement("ALTER TABLE petitions AUTO_INCREMENT = 1;");
        DB::table("petitions")->insert([
            "id" => 1,
            "title" => "perros navideños",
            "description" => "¡Es navidad! asi que, ¿porque no le ponemos gorro a los perros?",
            "destinatary" => "all",
            "status" => "acepted",
            "user_id" =>1,
            "signers"=>0,
            "category_id"=>1
    ]);
        DB::statement("set foreign_key_checks=1");
    }
}
