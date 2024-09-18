<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];
    protected $fillable = ['category_id', 'name', 'price', 'description', 'image', 'available', 'quantity', 'delivery_date'];

    public function category()
    {
        return $this->belongsTo(CategoryProducts::class, 'category_id', 'id');
    }
}
