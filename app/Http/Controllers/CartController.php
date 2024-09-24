<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\CartItems;
use App\Models\Carts;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart()->with('cartItems.product')->first();
        return view('pages.cart', compact('cart'));
    }

    public function addToCart(CartCreateRequest $request)
    {
//        // Получаем количество из запроса
//        $quantity = $request->input('quantity', 1);

//        // Найдем товар в базе данных
//        $product = Products::find($productId);
//        if (!$product) {
//            return redirect()->back()->with('error', 'Товар не найден.');
//        }

//        // Проверяем доступность товара
//        if (!$product->available) {
//            return redirect()->back()->with('error', 'Товар недоступен для добавления в корзину.');
//        }


//
//        $currentQuantity = $cartItem ? $cartItem->quantity : 0;
//        $totalRequestedQuantity = $currentQuantity + $quantity;

//        // Проверяем доступное количество товара
//        if ($totalRequestedQuantity > $product->quantity) {
//            return redirect()->back()->with('error', 'Доступно только ' . $product->quantity . ' единиц товара.');
//        }

        $cartItem = auth()->user()->cart->cartItems()->firstOrCreate([
            'product_id' => $request->product_id,
        ]);
        $cartItem->quantity += $request->quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину.');
    }

    public function update(CartUpdateRequest $request, $cartItemId)
    {
        CartItems::where('id', $cartItemId)->update(['quantity' => $request->quantity]);

//        $product = Products::find($cartItem->product_id);

//        // Проверяем доступное количество товара
//        if ($request->input('quantity') > $product->quantity) {
//            return redirect()->back()->with('error', 'Доступно только ' . $product->quantity . ' единиц товара.');
//        }


//        // Пересчитываем общую стоимость корзины
//        $cart = Carts::find($cartItem->cart_id);
//        $totalPrice = CartItems::where('cart_id', $cart->id)
//            ->join('products', 'cart_items.product_id', '=', 'products.id')
//            ->sum(DB::raw('cart_items.quantity * products.price'));
//
//        $cart->total_price = $totalPrice;
//        $cart->save();

        return redirect()->back()->with('success', 'Количество товара обновлено.');
    }

    public function store($id)
    {
        $cart = Carts::find($id);
        $order = Orders::create([
            'user_id' => auth()->id(),
            'status' => 'В ожидании',
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

        return redirect()->back()->with('success', 'Заказ оформлен.');
    }
}
