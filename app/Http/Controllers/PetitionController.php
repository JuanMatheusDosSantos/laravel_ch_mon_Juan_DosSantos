<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File as FileFacade;

class PetitionController extends Controller
{
    function index()
    {
        $petitions = Petition::all();
        return view("petitions.index", compact("petitions"));
    }

    function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view("petitions.show", compact("petition"));
    }

    function listMine()
    {
        $user = Auth::id();
        $petitions = Petition::where("user_id", $user)->get();
        return view("petitions.mine", compact("petitions"));
    }

    function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:255|unique",
            "description" => "required",
            "destinatary" => "required",
            "category" => "required",
            "image" => "required|file|mimes:jpg,jpeg,png,webp"
        ]);

        try {
            $user = Auth::user();
            $categoryName=$request->category;
            $categoryId=Category::where("name",$categoryName)->first()->id;
            $petition=Petition::create([
                "title"=>$request->get("title"),
                "description"=>$request->get("description"),
                "destinatary"=>$request->get("destinatary"),
                "category_id"=>$categoryId,
                "user_id"=>$user->id,
                "signers"=>0,
                "status"=>"pending"
            ]);
            if ($request->hasFile("image")){
                $response_file=$this->fileUpload($request,$petition->id);
                if ($response_file){
                    return redirect("/mypetitions");
                }
            }else {
                return back()->withErrors(['Error creando la petición'])->withInput();
            }

        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
        return redirect("/mypetitions");
    }

    function create(Request $request)
    {
        $categories = Category::all();
        return view("petitions.edit-add", compact("categories"));
    }

    private function fileUpload(Request $request, $id = null)
    {
        $image=null;
        if ($request->hasFile("image")) {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/img/petitions'), $image);
            $petition=Petition::findOrFail($id);
            $petition->file()->create([
                'name' => $image,
                'file_path' => $image,
                'petition_id' => $id
            ]);
            return true;
        }
        return false;
    }
    function sign(Request $request, $id)
    {
        try {
            $petition=Petition::findOrFail($id);
            $userId=Auth::id();
            $firmas=$petition->signers()->get();
            foreach ($firmas as $firma){
                if ($firma->id==$userId){
                    return back()->withErrors("Ya has firmado esta petición")->withInput();
                }
            }
            $petition->signers()->attach($userId);
            $petition->signers=$petition->signers+1;
            $petition->save();
        }catch (\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect()->back();
    }
}
