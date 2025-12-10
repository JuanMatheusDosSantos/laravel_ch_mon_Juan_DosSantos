<?php

namespace App\Http\Controllers;

use App\Models\Category;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view("admin.categories.index",compact("categories"));
    }
}
