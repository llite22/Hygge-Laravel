<?php

namespace App\Http\Controllers;

use App\Http\Filters\CategoryImageFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Categories;
use App\Models\CategoryImages;
use App\Models\Sliders;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //реляционные связи для вывода галереи
        $sliders = Sliders::all();
        $categories = Categories::all();
        $categories_images = CategoryImages::all();
        return view('pages.main', compact('sliders', 'categories', 'categories_images'));
    }
}
