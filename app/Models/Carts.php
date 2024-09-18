<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $guarded = [];
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
