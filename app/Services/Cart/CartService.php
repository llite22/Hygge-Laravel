<?php

namespace App\Services\Cart;

use App\Models\CartItems;
use App\Models\Carts;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;

class CartService
{

    public function addToCart(array $data)
    {
        $cartItem = auth()->user()->cart->cartItems()->firstOrCreate([
            'product_id' => $data['product_id'],
        ]);
        $cartItem->quantity += $data['quantity'];
        $cartItem->save();
    }

    public function store($id)
    {
        $cart = Carts::find($id);
        $order = Orders::create([
            'user_id' => auth()->id(),
            'total_price' => $cart->calculateTotalPrice(),
        ]);

        $cart->cartItems->each(function ($item) use ($order) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ]);

            $product = Products::find($item->product_id);
            $product->quantity -= $item->quantity;
            $product->available = $product->quantity > 0;
            $product->save();
        });

        CartItems::where('cart_id', $cart->id)->delete();
    }
}
