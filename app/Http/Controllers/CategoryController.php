<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        //Eloquent
        $categories = Category::all()->toArray();

        //Query Builder
        //$categories = DB::table("categories")->get()->toArray();

        //Raw Query
        //$categories = DB::select("SELECT * FROM categories");

        dd($categories);
    }
}
