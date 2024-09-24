<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Product\AdminProductRequest;
use App\Models\CategoryProducts;
use App\Models\Products;

class AdminProductsController extends BaseController
{
    public function index()
    {
        $category_products = CategoryProducts::has('products')->with('products')->get();
        return view('pages.adminProducts', compact('category_products'));
    }

    public function create()
    {
        $category_products = CategoryProducts::all();
        return view('admin.component.product.create', compact('category_products'));
    }


    public function store(AdminProductRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->route('admin.products');
    }

    public function edit($id)
    {
        $category_products = CategoryProducts::all();
        $product = Products::findOrFail($id);
        return view('admin.component.product.edit', compact('category_products', 'product'));
    }


    public function update(AdminProductRequest $request)
    {
        $this->service->update($request->all(), $request->id);
        return redirect()->route('admin.products');
    }


    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->back();
    }
}
