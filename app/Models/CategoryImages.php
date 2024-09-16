<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImages extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'category_images';
    protected $guarded = [];
    protected $fillable = ['image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
