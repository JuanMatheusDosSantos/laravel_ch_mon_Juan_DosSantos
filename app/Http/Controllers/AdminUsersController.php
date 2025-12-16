<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
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
        if ($request->has("redirect")){
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
        return redirect()->to(session("redirect_after_update",route("admin.home")));
    }
    function delete($id)
    {
        try {

        }catch (\Exception $e){

        }
        return ;
    }
}
