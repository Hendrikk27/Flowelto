<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //menampilkan view home dengan category
    public function index()
    {
        $categoryArr = Category::all();
        return view('home', compact('categoryArr', $categoryArr));
    }
}
