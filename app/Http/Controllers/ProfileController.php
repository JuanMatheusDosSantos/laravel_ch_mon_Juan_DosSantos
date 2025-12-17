<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
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
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
