<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;

class AdminPetitionsController extends Controller
{
    public function index()
    {
        $petitions = Petition::all();
        return view("admin.home", compact("petitions"));
    }

    function cambiarEstado(Request $request, $id)
    {
        $petition = Petition::findOrFail($id);
        $petitionStatus = $petition->status;
        try {
            switch ($petitionStatus) {
                case "accepted":
                    $petition->status = "deny";
                    break;
                case "pending":
                case "deny":
                    $petition->status = "accepted";
                    break;
            }
            $petition->save();
        } catch (\Exception $e) {
            return response()->json(["message" => "error", $e->getMessage()], 400);
        }
        $petitions = Petition::all();
        return view("admin.home", compact("petitions"));
    }
}
