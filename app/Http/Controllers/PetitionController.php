<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File as FileFacade;

class PetitionController extends Controller
{
    function index()
    {
        $categories=Category::all();
        $petitions = Petition::all();
        return view("petitions.index", compact("petitions","categories"));
    }

    function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view("petitions.show", compact("petition"));
    }
    function filterByCategory($id)
    {
        $categories=Category::all();
        $petitions=Petition::where("category_id",$id)->get();
        $category_name=Category::where("id",$id)->get()->first()->name;
        return view("petitions.category",compact("petitions","categories","category_name"));
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
            "title" => "required|max:255|unique:petitions,title",
            "description" => "required",
            "destinatary" => "required",
            "category" => "required",
            "image" => "required|file|mimes:jpg,jpeg,png,webp"
        ]);

        try {
            $user = Auth::user();
            $categoryId =$request->category;
            $petition=Petition::create([
                "title"=>$request->get("title"),
                "description"=>$request->get("description"),
                "destinatary"=>$request->get("destinatary"),
                "category_id"=>$categoryId,
                "user_id"=>$user->id,
                "signers"=>0,
                "status"=>"pending"
            ]);
            if ($request->hasFile("image")) {
                $response = $this->fileUpload($request, $petition->id);
                if (!$response) {
                    return back()->withErrors(['image' => 'No se pudo subir la imagen'])->withInput();
                }
            } else {
                // Esto es un caso raro, normalmente el validator ya impide que pase
                return back()->withErrors(['image' => 'Debes seleccionar una imagen'])->withInput();
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
            $path=public_path('assets\img\petitions');
            $pathName=pathinfo($request->file("image")->getClientOriginalName(),PATHINFO_FILENAME);
            $temp=$request->file("image")->getPathname();
            if (!copy($temp, $path . DIRECTORY_SEPARATOR . $image)) {
                return false; // Error al copiar
            }

            // Asociar archivo a la petición
            $petition = Petition::findOrFail($id);
            $petition->file()->create([
                'name' => $pathName,
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
            if(!$petition->userSigners->contains(Auth::id())) {
                $petition->userSigners()->attach($userId);
                $petition->signers = $petition->signers + 1;
            }else{
                $petition->userSigners()->detach($userId);
                $petition->signers = $petition->signers - 1;
            }
            $petition->save();
        }catch (\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect()->back();
    }
    function signedPetitions()
    {
        $user=Auth::user();
        $signeds=$user->signedPetitions()->paginate(12);
        return view("petitions.mySigned",compact("signeds"));
    }
}
