<?php

use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminPetitionsController;

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
    Route::get("petitions/category/{id}", "filterByCategory")->name("petitions.category");
    Route::get("mypetitions", "listMine")->name("petitions.mine");
    Route::get("petitions", "signedPetitions")->name("petitions.mySigned");

    Route::get("petition/{id}", "show")->name("petitions.show");
    Route::get("petitions/add", "create")->name("petitions.create");
    Route::post("petition", "store")->name("petitions.store");
    Route::delete("petition/{id}", "delete")->name("petitions.delete");
    Route::put('petition/{id}', 'update')->name('petitions.update');
    Route::post('petition/sign/{id}', 'sign')->name('petitions.firmar');
    Route::get('petition/edit/{id}', 'update')->name('petitions.edit');

});
Route::middleware("admin")->
controller(AdminCategoriesController::class)->group(function () {
    Route::get('admin', 'index')->name('admin.home');
    Route::get('admin/peticiones/index', 'index')->name('adminpetitions.index');
    Route::get('admin/peticiones/{id}', 'show')->name('adminpetitions.show');
    Route::get('admin/peticion/add', 'create')->name('adminpetitions.create');
    Route::get('admin/peticiones/edit/{id}', 'edit')->name('adminpetitions.edit');
    Route::post('admin/peticiones', 'store')->name('adminpetitions.store');
    Route::delete('admin/peticiones/{id}', 'delete')->name('adminpetitions.delete');
    Route::put('admin/peticiones/{id}', 'update')->name('adminpetitions.update');
    Route::put('admin/peticiones/estado/{id}', 'cambiarEstado')->name('adminpetitions.estado');
});
Route::middleware("admin")->
controller(AdminUsersController::class)->group(function () {
    Route::get('admin/categories/index', 'index')->name('admincategories.index');
    Route::get('admin/categories/{id}', 'show')->name('admincategories.show');
    Route::get('admin/category/add', 'create')->name('admincategories.create');
    Route::get('admin/categories/edit/{id}', 'edit')->name('admincategories.edit');
    Route::post('admin/categories', 'store')->name('admincategories.store');
    Route::delete('admin/categories/{id}', 'delete')->name('admincategories.delete');
    Route::put('admin/categories/{id}', 'update')->name('admincategories.update');
    Route::put('admin/categories/estado/{id}', 'cambiarEstado')->name('admincategories.estado');
});
Route::middleware("admin")->
controller(AdminPetitionsController::class)->group(function () {
    Route::get('admin/users/index', 'index')->name('adminusers.index');
    Route::get('admin/users/{id}', 'show')->name('adminusers.show');
    Route::get('admin/user/add', 'create')->name('adminusers.create');
    Route::get('admin/users/edit/{id}', 'edit')->name('adminusers.edit');
    Route::post('admin/users', 'store')->name('adminusers.store');
    Route::delete('admin/users/{id}', 'delete')->name('adminusers.delete');
    Route::put('admin/users/{id}', 'update')->name('adminusers.update');
    Route::put('admin/users/estado/{id}', 'cambiarEstado')->name('adminusers.estado');
});
require __DIR__ . '/auth.php';
