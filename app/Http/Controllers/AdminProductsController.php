<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Sliders;
use Illuminate\Http\Request;


class AdminProductsController extends Controller
{
    public function index()
    {
        return view('pages.adminProducts');
    }
}
