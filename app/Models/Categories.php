<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = [];
    protected $fillable = ['name'];

    public function images()
    {
        return $this->hasMany(CategoryImages::class, 'category_id', 'id');
    }

}
