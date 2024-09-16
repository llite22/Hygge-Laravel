<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Sliders;

class MainController extends Controller
{
    public function index()
    {
        //реляционные связи для вывода галереи
        $sliders = Sliders::all();
        $categories = Categories::with('images')->get();
        return view('pages.main', compact('sliders', 'categories'));
    }
}
