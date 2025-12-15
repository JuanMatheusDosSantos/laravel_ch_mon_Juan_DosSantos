<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Petition;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view("admin.categories.index",compact("categories"));
    }
    function show($id)
    {
        try {
            $petitions = Petition::where("category_id",$id)->get();
        } catch (\Exception $e) {
            return response()->json(["message" => "error", "no se ha podido encontrar la peticion"]);
        }
        return view("admin.categories.show", compact("petitions"));
    }
    function edit($id)
    {
        $category=Category::findOrFail($id);
        return view("admin.categories.edit-add",compact("category"));
    }
    function update(Request $request, $id)
    {
        try {
            $category=Category::findOrFail($id);
            if ((!is_null($request->name))&&$category->name!=$request->name) {
                $category->name = $request->name;
            }

            if ((!is_null($request->description))&&($category->description!=$request->description)) {
            $category->description=$request->description;
            }
        }catch (\Exception $e){
            return response()->json(["message" => "error", "no se ha podido encontrar la categoria"]);
        }
        $category->save();
        return redirect()->route("admincategories.index");
    }
    function delete($id)
    {
        try {
            Category::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return response()->json(["message" => "error", "no se ha podido encontrar la petición"]);
        }
        return redirect()->route("admin.home");
    }
    function create()
    {
        return view("admin.categories.create");
    }
    function store(Request $request)
    {
        try {
            $request->validate([
                "name"=>"required|max:255",
                "description"=>"nullable"
            ]);
            $category = Category::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }catch (\Exception $e){
            return response()->json(["message" => "error", "no se ha podido crear la categoria"]);
        }
    }
}
