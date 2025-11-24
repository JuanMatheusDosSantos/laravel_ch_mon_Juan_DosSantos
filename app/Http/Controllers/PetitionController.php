<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    function index()
    {
        $petitions=Petition::all();
        return view("petitions.index",compact("petitions"));
    }
    function show($id)
    {
        $petition=Petition::findOrFail($id);
        return view("petitions.show",compact("petition"));
    }
}
