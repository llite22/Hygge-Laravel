<?php

namespace App\Http\Controllers;


use App\Http\Requests\SlidersRequest;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminSlidersController extends Controller
{
    public function index()
    {
        $sliders = Sliders::all();
        $table = 'sliders';
        return view('pages.adminSliders', compact('sliders', 'table'));
    }

    public function create($table)
    {
        return view('admin.component.admin.create', compact('table'));
    }


    public function store(SlidersRequest $request)
    {
        if($request->has('base64_image')) {
            $name = $request->file('image')->getClientOriginalName();
            $imageData = explode(',', $request->base64_image)[1];
            $image = base64_decode($imageData);
            $fileName = time() . '_' . $request->file_name;
            $relativePath = 'images/' . $fileName . $name;

            Storage::disk('public')->put($relativePath, $image);

            $upload = new Sliders();
            $upload->text = $request->text;
            $upload->image = $relativePath;
            $upload->save();
        }
        return redirect()->route('admin.sliders');
    }


    public function edit($table, $id)
    {
        $slider = Sliders::find($id);
        return view('admin.component.admin.edit', compact('slider', 'id', 'table'));
    }


    public function update(SlidersRequest $request)
    {
        $data = $request->all();
        $slider = Sliders::findOrFail($request->id);
        if($request->hasFile('image')) {
            if (Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $upload = new Sliders();
            $upload->text = $request->text;
            $upload->image = $imagePath;
            $upload->save();
        }

        $slider->update($data);
        return redirect()->route('admin.sliders');

    }



    public function destroy($table = null, $id)
    {
        $slider = Sliders::findOrFail($id);
        if (Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }
        Sliders::destroy($id);
        return redirect()->route('admin.sliders');
    }
}
