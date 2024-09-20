<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\AdminProductRequest;
use App\Models\CategoryProducts;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;


class AdminProductsController extends Controller
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
        $data = $request->all();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $fileName = time() . '_' . $img->getClientOriginalName();
            Storage::disk('public')->put('images/' . $fileName, file_get_contents($img));
            $data['image'] = 'images/' . $fileName;
        }

        Products::create($data);
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
        $data = $request->all();
        $product = Products::findOrFail($request->id);
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $fileName = time() . '_' . $img->getClientOriginalName();
            Storage::disk('public')->put('images/' . $fileName, file_get_contents($img));
            $data['image'] = 'images/' . $fileName;
        }
        $product->update($data);
        return redirect()->route('admin.products');

    }


    public function destroy($id)
    {
        $product = Products::find($id);
        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        Products::destroy($id);
        return redirect()->back();
    }
}
