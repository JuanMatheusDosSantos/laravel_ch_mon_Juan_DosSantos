<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Petition;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Http\Request;

class AdminPetitionsController extends Controller
{
    public function index()
    {
        $petitions = Petition::all();
        return view("admin.home", compact("petitions"));
    }

    function cambiarEstado($id)
    {
        try {
            $petition = Petition::findOrFail($id);
            $petitionStatus = $petition->status;
            switch ($petitionStatus) {
                case "accepted":
                    $petition->status = "pending";
                    break;
                case "pending":
                    $petition->status = "accepted";
                    break;
            }
            $petition->save();
        } catch (\Exception $e) {
            return response()->json(["message" => "error", "ha ocurrido un error"], 400);
        }
        return redirect()->route("admin.home");
    }

    function show($id)
    {
        try {
            $petition = Petition::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(["message" => "error", "no se ha podido encontrar la peticion"]);
        }
        return view("admin.petitions.show", compact("petition"));
    }

    function delete($id)
    {
        try {
            Petition::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return response()->json(["message" => "error", "no se ha podido encontrar la peticion"]);
        }
        return redirect()->route("admin.home");
    }

    function edit($id)
    {
        $categories=Category::all();
        $petition = Petition::findOrFail($id);
        return view("admin.petitions.edit-add", compact("petition","categories"));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            "title" => "max:255|unique:petitions,title|nullable",
            "description" => "nullable|max:255",
            "destinatary" => "nullable|max:255",
            "category" => "required",
            "signers"=>"numeric|min:0",
            "status"=>"required|in:accepted,pending",
            "image" => "nullable|file|mimes:jpg,jpeg,png,webp"
        ]);
        try {
            $petition = Petition::findOrFail($id);
            if (!is_null($request->title)) {
                $petition->title = strtolower($request->title);
            }
            if (!is_null($request->description)) {
                $petition->description = $request->description;
            }try {
            if (!is_null($request->image)) {
                $this->fileReUpload($request, $petition->id);
                }
            }catch (\Exception $e){
                return response()->json([
                    "message" => "error",
                    "error"   => $e->getMessage(),
                    "line"    => $e->getLine(),
                    "file"    => $e->getFile(),
                    "trace"   => $e->getTraceAsString(),
                ], 400);
            }
            if (!is_null($request->destinatary)) {
                $petition->destinatary = $request->destinatary;
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
                return false; // Error al copiar
            }
            $petition = Petition::findOrFail($id);
            if ($imagenOriginal){
                $imagenOriginal->update([
                    "name"=>$pathName,
                    "file_path"=>$image
                ]);
            }
            else{$petition->file()->create([
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
}
