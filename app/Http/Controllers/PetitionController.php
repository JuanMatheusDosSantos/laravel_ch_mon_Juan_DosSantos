<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    function listMine()
    {
        $user=Auth::id();
        $petition=Petition::where("user_id",$user);
        return view("petitions.mine",compact("petition"));
    }
}
