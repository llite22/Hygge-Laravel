<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    use HasFactory;

    protected $table = 'category_products';
    protected $guarded = [];
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
