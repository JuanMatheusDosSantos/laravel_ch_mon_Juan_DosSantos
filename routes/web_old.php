<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get("/", [PagesController::class, "home"])->name("home");
Route::get("/users/firmas", [UserController::class, "peticionesFirmadas"])->middleware("auth");

Route::controller(PetititionController::class)->group(function () {
    Route::get("petitions/index", "index")->name("peticiones.index");
    Route::get("mypetitions", "listMine")->name("peticiones.mine");
    Route::get("petitions", "signedpetitions")->name("peticiones.peticionesfirmadas");

    Route::get("petitions/{id}", "index")->name("peticiones.show");
    Route::get("petitions/add", "create")->name("peticiones.create");
    Route::post("petition", "store")->name("petiticiones.store");
    Route::delete("petition/{id}", "delete")->name("peticiones.delete");
    Route::put('petition/{id}', 'update')->name('peticiones.update');
    Route::post('petition/sign/{id}', 'sing')->name('peticiones.firmar');
    Route::get('petition/edit/{id}', 'update')->name('peticiones.edit');

});
