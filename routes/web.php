<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get("/", [PagesController::class, "home"])->name("home");
Route::get("/users/firmas", [UserController::class, "peticionesFirmadas"])->middleware("auth");

Route::controller(PetitionController::class)->group(function () {
    Route::get("petitions/index", "index")->name("petitions.index");
    Route::get("mypetitions", "listMine")->name("petitions.mine");
    Route::get("petitions", "signedpetitions")->name("petitions.peticionesfirmadas");

    Route::get("petition/{id}", "show")->name("petitions.show");
    Route::get("petitions/add", "create")->name("petitions.create");
    Route::post("petition", "store")->name("petitions.store");
    Route::delete("petition/{id}", "delete")->name("petitions.delete");
    Route::put('petition/{id}', 'update')->name('petitions.update');
    Route::post('petition/sign/{id}', 'sign')->name('petitions.firmar');
    Route::get('petition/edit/{id}', 'update')->name('petitions.edit');

});
require __DIR__.'/auth.php';
