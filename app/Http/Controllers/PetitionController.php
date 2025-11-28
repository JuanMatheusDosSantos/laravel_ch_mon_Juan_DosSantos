<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $petitions=Petition::where("user_id",$user)->get();
        return view("petitions.mine",compact("petitions"));
    }
    function store(Request $request)
    {
        $this->validate($request,[
            "title"=>"required|max:255",
            "description"=>"require",
            "destinatary"=>"require",
            "category"=>"require",
    ]);
        try {
            $category=Category::findOrFail($input["category"]);
            $user=Auth::user();
            $petition=New Petition($input);
            $petition->category()->associate($category);
            $petition->user()->associate($user);
            $petition->signers=0;
            $petition->status=0;
            $res=$petition->save();
            if ($res){
                return ;
            }

        }catch (\Exception $e){

        }
    }
    function fileupload(Request $request, $id)
    {
        $image=null;
        if (){

        }
    }
}
