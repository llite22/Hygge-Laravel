<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoryProductRequest;
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
        $data = $request->all();
        CategoryProducts::create($data);
        return redirect()->route('admin.category-products');
    }

    public function edit(AdminCategoryProductRequest $request)
    {
        $id = $request->segment(4);
        $category_product = CategoryProducts::findOrFail($id);
        if (!ctype_digit($id)) {
            abort(404);
        }
        return view('admin.component.categoryProducts.edit', compact('category_product', 'id'));
    }

    public function update(AdminCategoryProductRequest $request)
    {
        $id = $request->segment(3);
        $data = $request->all();
        $category_product = CategoryProducts::findOrFail($id);
        $category_product->update($data);
        return redirect()->route('admin.category-products');

    }

    public function destroy(AdminCategoryProductRequest $request)
    {
        $id = $request->segment(3);
        $category_product = CategoryProducts::find($id);
        $category_product->delete();
        return redirect()->back();
    }
}
