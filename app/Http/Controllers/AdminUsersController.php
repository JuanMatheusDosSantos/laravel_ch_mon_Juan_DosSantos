<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view("admin.users.index", compact("users"));
    }

    function show($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(["message" => "error", "no se ha podido encontrar al ususario"]);
        }
        return view("admin.users.show", compact("user"));
    }

    function edit($id, Request $request)
    {
        //esto guarda en la sesion la anterior url
        if ($request->has("redirect")) {
            session(['redirect_after_update' => $request->redirect]);
        }
        $user = User::findOrFail($id);
        return view("admin.users.edit-add", compact("user"));
    }

    function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            if (!is_null($request->name) && $request->name != $user->name) {
                $user->name = $request->name;
            }
            if (!is_null($request->email) && $request->email != $user->email) {
                $user->email = $request->email;
            }
            if (!is_null($request->role_id) && $request->role_id != $user->role_id) {
                $user->role_id = $request->role_id;
            }
            $user->save();
        } catch (\Exception $e) {

        }
        return redirect()->to(session("redirect_after_update", route("admin.home")));
    }

    function delete($id)
    {

        try {
            $user=User::findOrFail($id);
            if (!is_null($user->petitions)){

                Petition::where("user_id",$user)->delete();
            }
            if ($user->role_id&&User::where("role_id",1)->count()==1){
                return redirect()->route("adminusers.index")->
                with("alert","no puedes eliminar este usuario debido a que es el único admin que hay");
            }
            if (!is_null($user->signedPetitions)){
                $petitionsSigneds=$user->signedPetitions;
                foreach ($petitionsSigneds as $petitionsSigned){
                    $petition=Petition::findOrFail($petitionsSigned->id);
                    $petition->signers-=1;
                    $petitionsSigned->delete();
                }
            }
            $user->delete();
        } catch (\Exception $e) {
            return response()->json(["message" => "error",
                "no se ha podido encontrar la petición"
//                $e->getMessage()
            ]);
        }
        return redirect()->route("adminusers.index");
    }

    function create()
    {
        return view("admin.users.create");
    }

    function store(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|max:255|string",
                "email" => "required|max:255|email",
                "password" => "required|max:255",
                "role_id" => "nullable|boolean"
            ]);

            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt($request->password),
                "role_id"=>$request->role_id
            ]);
        } catch (\Exception $e) {
            return response()->json(["message" => "error",
                $e->getMessage()
//                "no se ha podido crear el usuario"
            ]);
        }
//        dd($request->role_id);
        return redirect()->route("adminusers.index");
    }
}
