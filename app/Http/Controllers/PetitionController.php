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
        $categories = Category::all();
        $petitions = Petition::all();
        return view("petitions.index", compact("petitions", "categories"));
    }

    function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view("petitions.show", compact("petition"));
    }

    function filterByCategory($id)
    {
        $categories = Category::all();
        $petitions = Petition::where("category_id", $id)->get();
        $category_name = Category::where("id", $id)->get()->first()->name;
        return view("petitions.category", compact("petitions", "categories", "category_name"));
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
            $categoryId = $request->category;
            $petition = Petition::create([
                "title" => $request->get("title"),
                "description" => $request->get("description"),
                "destinatary" => $request->get("destinatary"),
                "category_id" => $categoryId,
                "user_id" => $user->id,
                "signers" => 0,
                "status" => "pending"
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
        $image = null;
        if ($request->hasFile("image")) {
            $image = time() . '.' . $request->image->extension();
            $path = public_path('assets\img\petitions');
            $pathName = pathinfo($request->file("image")->getClientOriginalName(), PATHINFO_FILENAME);
            $temp = $request->file("image")->getPathname();
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
            $petition = Petition::findOrFail($id);
            $userId = Auth::id();
            if (!$petition->userSigners->contains(Auth::id())) {
                $petition->userSigners()->attach($userId);
                $petition->signers = $petition->signers + 1;
            } else {
                $petition->userSigners()->detach($userId);
                $petition->signers = $petition->signers - 1;
            }
            $petition->save();
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect()->back();
    }

    function signedPetitions()
    {
        $user = Auth::user();
        $signeds = $user->signedPetitions()->paginate(12);
        return view("petitions.mySigned", compact("signeds"));
    }

    function delete($id)
    {
        $this->authorize("delete", Petition::findOrFail($id));
        try {
            Petition::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return response()->json(["message" => "error", "no se ha podido encontrar la peticion"]);
        }
        return redirect()->route("petitions.index");
    }

    function update(Request $request, $id)
    {
        $request->validate([
            "title" => "max:255|unique:petitions,title|nullable",
            "description" => "nullable|max:255",
            "destinatary" => "nullable|max:255",
            "category" => "required",
            "signers" => "numeric|min:0",
            "status" => "required|in:accepted,pending",
            "image" => "nullable|file|mimes:jpg,jpeg,png,webp"
        ]);
        $this->authorize("update", Petition::findOrFail($id));
        try {
            $petition = Petition::findOrFail($id);
            if (!is_null($request->title)) {
                $petition->title = strtolower($request->title);
            }
            if (!is_null($request->description)) {
                $petition->description = $request->description;
            }
            try {
                if (!is_null($request->image)) {
                    $this->fileReUpload($request, $petition->id);
                }
            } catch (\Exception $e) {
                return response()->json([
                    "message" => "error",
                    "error" => $e->getMessage(),
                    "line" => $e->getLine(),
                    "file" => $e->getFile(),
                    "trace" => $e->getTraceAsString(),
                ], 400);
            }
            if (!is_null($request->destinatary)) {
                $petition->destinatary = $request->destinatary;
            }
            if ((!is_null($request->status)) && ($petition->status != $request->status)) {
                $petition->status = $request->status;
            }
        } catch (\Exception $e) {
            return response()->json(["message" => "error",
//                "ha ocurrido un error"
                $e
            ], 400);
        }
        $petition->save();
        return redirect()->route("admin.home");
    }

    function fileReUpload(Request $request, $id)
    {
        try {
            $imagenOriginal = File::where("petition_id", $id)->first();
            $original = public_path("assets/img/petitions/" . $imagenOriginal->file_path);
            if (FileFacade::exists($original)) {
                FileFacade::delete($original);
            }
            $image = time() . '.' . $request->image->extension();
            $path = public_path('assets\img\petitions');
            $pathName = pathinfo($request->file("image")->getClientOriginalName(), PATHINFO_FILENAME);
            $temp = $request->file("image")->getPathname();
            if (!copy($temp, $path . DIRECTORY_SEPARATOR . $image)) {
                return false;
            }
            $petition = Petition::findOrFail($id);
            if ($imagenOriginal) {
                $imagenOriginal->update([
                    "name" => $pathName,
                    "file_path" => $image
                ]);
            } else {
                $petition->file()->create([
                    'name' => $pathName,
                    'file_path' => $image,
                    'petition_id' => $id
                ]);
                return true;
            }
        } catch (\Exception $e) {
            return response()->json(["message" => "error",
//                "ha ocurrido un error"
                $e
            ], 400);
        }
        return false;
    }

    function edit($id)
    {
        $petition = Petition::findOrFail($id);
        $this->authorize("edit", $petition);
        $categories = Category::all();
        return view("petitions.update", compact("petition", "categories"));
    }
}
