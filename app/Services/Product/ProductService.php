<?php

namespace App\Services\Product;

use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store(array $data)
    {
        if (isset($data['image'])) {
            $img = $data['image'];
            $fileName = time() . '_' . $img->getClientOriginalName();
            Storage::disk('public')->put('images/' . $fileName, file_get_contents($img));
            $data['image'] = 'images/' . $fileName;
        }
        Products::create($data);
    }

    public function update(array $data, $id)
    {
        $product = Products::findOrFail($id);
        if (isset($data['image'])) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $img = $data['image'];
            $fileName = time() . '_' . $img->getClientOriginalName();
            Storage::disk('public')->put('images/' . $fileName, file_get_contents($img));
            $data['image'] = 'images/' . $fileName;
        }
        $product->update($data);
    }

    public function destroy($id)
    {
        $product = Products::find($id);
        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        Products::destroy($id);
    }
}
