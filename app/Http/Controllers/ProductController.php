<?php

namespace App\Http\Controllers;

use App\Models\CategoryProducts;

class ProductController extends Controller
{
    public function index()
    {
        $products = CategoryProducts::with('products')->get();
        return view('pages.product', compact('products'));
    }
}
