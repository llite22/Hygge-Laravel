<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryImagesRequest;
use App\Models\Categories;
use App\Models\CategoryImages;
use Illuminate\Support\Facades\Storage;

class AdminCategoryImagesController extends Controller
{
    public function index()
    {
        $category_images = Categories::has('images')->with('images')->get();
        $table = 'category-images';
        return view('pages.adminCategoryImages', compact('category_images', 'table'));
    }

    public function create($table)
    {
        $categories = Categories::all();
        return view('admin.component.admin.create', compact('table', 'categories'));
    }


    public function store(CategoryImagesRequest $request)
    {
        $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $upload = new CategoryImages();
            $upload->category_id = $request->category_id;
            $upload->image = $imagePath;
            $upload->save();
        }
        return redirect()->route('admin.category-images');
    }

    public function edit($table, $id)
    {
        $categories = Categories::all();
        $categories_images = CategoryImages::find($id);
        return view('admin.component.admin.edit', compact('categories_images', 'id', 'table', 'categories'));
    }

    public function update(CategoryImagesRequest $request)
    {
        $category_image = CategoryImages::findOrFail($request->id);
        $category_image->update($request->all());
        return redirect()->route('admin.category-images');

    }

    public function destroy($table = null, $id)
    {
        $category_images = CategoryImages::findOrFail($id);
        if (Storage::disk('public')->exists($category_images->image)) {
            Storage::disk('public')->delete($category_images->image);
        }
        CategoryImages::destroy($id);
        return redirect()->route('admin.category-images');
    }

}
