<?php

namespace App\Http\Controllers;

use App\Models\Petition;

class AdminPetitionsController extends Controller
{
    public function index()
    {
        $petitions=Petition::all();
        return view("admin.home",compact("petitions"));
    }
}
