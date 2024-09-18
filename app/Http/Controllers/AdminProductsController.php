<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductRequest;
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

        $data['available'] = filter_var($data['available'], FILTER_VALIDATE_BOOLEAN);

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $fileName = time() . '_' . $img->getClientOriginalName();
            Storage::disk('public')->put('images/' . $fileName, file_get_contents($img));
            $data['image'] = 'images/' . $fileName;
        }

        Products::create($data);
        return redirect()->route('admin.products');
    }

    public function edit(AdminProductRequest $request)
    {
        $category_products = CategoryProducts::all();
        $id = $request->segment(4);
        $product = Products::findOrFail($id);
        if (!ctype_digit($id)) {
            abort(404);
        }
        return view('admin.component.product.edit', compact('category_products', 'product', 'id'));
    }


    public function update(AdminProductRequest $request)
    {
        $id = $request->segment(3);
        $data = $request->all();
        $product = Products::findOrFail($id);
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $fileName = time() . '_' . $img->getClientOriginalName();
            Storage::disk('public')->put('images/' . $fileName, file_get_contents($img));
            $data['image'] = 'images/' . $fileName;
        }
        $product->update($data);
        return redirect()->route('admin.products');

    }


    public function destroy(AdminProductRequest $request)
    {
        $id = $request->segment(3);
        $product = Products::find($id);
        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->back();
    }
}
