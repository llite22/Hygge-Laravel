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

    public function create($table)
    {
        return view('admin.component.admin.create', compact('table'));
    }


    public function store(CategoriesRequest $request)
    {
        Categories::create($request->all());
        return redirect()->route('admin.categories');
    }

    public function edit($table = null, $id)
    {
        $categories = Categories::find($id);
        return view('admin.component.admin.edit', compact('categories', 'id', 'table'));
    }


    public function update(CategoriesRequest $request)
    {
        $category = Categories::findOrFail($request->id);
        $category->update($request->all());
        return redirect()->route('admin.categories');

    }


    public function destroy($table = null, $id)
    {
        Categories::destroy($id);
        return redirect()->route('admin.categories');
    }
}
