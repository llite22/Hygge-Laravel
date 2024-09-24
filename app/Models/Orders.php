<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([OrderObserver::class])]
class Orders extends Model
{
    use HasFactory;


    protected $table = 'orders';
    protected $guarded = [];
    protected $fillable = ['user_id', 'product_id', 'status', 'total_price'];

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
