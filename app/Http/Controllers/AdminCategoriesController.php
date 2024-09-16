<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $table = 'categories';
        return view('pages.adminCategories', compact('categories', 'table'));
    }

    public function create(CategoriesRequest $request)
    {
        $table = $request->segment(2);
        return view('admin.component.admin.create', compact('table'));
    }


    public function store(CategoriesRequest $request)
    {
        $data = $request->validated();
        Categories::create($data);
        return redirect()->route('admin.categories');
    }

    public function edit(CategoriesRequest $request)
    {
        $table = $request->segment(2);
        $id = $request->segment(5);
        if (!ctype_digit($id)) {
            abort(404);
        }
        $categories = Categories::find($id);
        return view('admin.component.admin.edit', compact('categories', 'id', 'table'));
    }


    public function update(CategoriesRequest $request)
    {
        $id = $request->segment(4);
        $category = Categories::findOrFail($id);

        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.categories');

    }


    public function destroy(CategoriesRequest $request)
    {
        $id = $request->segment(4);
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories');
    }

}
