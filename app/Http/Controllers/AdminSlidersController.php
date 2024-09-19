<?php

namespace App\Http\Controllers;


use App\Http\Requests\SlidersRequest;
use App\Models\Sliders;
use Illuminate\Support\Facades\Storage;


class AdminSlidersController extends Controller
{
    public function index()
    {
        $sliders = Sliders::all();
        $table = 'sliders';
        return view('pages.adminSliders', compact('sliders', 'table'));
    }

    public function create(SlidersRequest $request)
    {
        $table = $request->segment(2);
        return view('admin.component.admin.create', compact('table'));
    }


    public function store(SlidersRequest $request)
    {
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $upload = new Sliders();
            $upload->text = $request->text;
            $upload->image = $imagePath;
            $upload->save();
        }
        return redirect()->route('admin.sliders');
    }


    public function edit(SlidersRequest $request)
    {
        $table = $request->segment(2);
        $id = $request->segment(5);
        if (!ctype_digit($id)) {
            abort(404);
        }
        $slider = Sliders::find($id);
        return view('admin.component.admin.edit', compact('slider', 'id', 'table'));
    }


    public function update(SlidersRequest $request)
    {
        $id = $request->segment(4);
        $slider = Sliders::findOrFail($id);

        $data = $request->validated();
        $slider->update($data);
        return redirect()->route('admin.sliders');

    }

    public function destroy(SlidersRequest $request)
    {
        $id = $request->segment(4);
        $slider = Sliders::findOrFail($id);
        if (Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();
        return redirect()->route('admin.sliders');
    }
}
