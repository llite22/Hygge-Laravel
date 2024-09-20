<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryProduct\AdminCategoryProductRequest;
use App\Models\CategoryProducts;


class AdminCategoryProductsController extends Controller
{
    public function index()
    {
        $category_products = CategoryProducts::all();
        return view('pages.adminCategoryProducts', compact('category_products'));
    }

    public function create()
    {
        $category_products = CategoryProducts::all();
        return view('admin.component.categoryProducts.create', compact('category_products'));
    }

    public function store(AdminCategoryProductRequest $request)
    {
        CategoryProducts::create($request->all());
        return redirect()->route('admin.category-products');
    }

    public function edit(CategoryProducts $category_product)
    {
        return view('admin.component.categoryProducts.edit', compact('category_product'));
    }

    public function update(CategoryProducts $category_product)
    {
        $category_product->update(request()->all());
        return redirect()->route('admin.category-products');
    }

    public function destroy($category_product)
    {

        CategoryProducts::destroy($category_product);
        return redirect()->back();
    }
}
