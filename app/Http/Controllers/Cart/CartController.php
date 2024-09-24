<?php

namespace App\Http\Controllers\Cart;

use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
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

        $this->service->addToCart($request->all());
        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину.');
    }

    public function update(CartUpdateRequest $request, $cartItemId)
    {
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

        CartItems::where('id', $cartItemId)->update(['quantity' => $request->quantity]);
        return redirect()->back()->with('success', 'Количество товара обновлено.');
    }

    public function store($id)
    {
        $this->service->store($id);
        return redirect()->back()->with('success', 'Заказ оформлен.');
    }
}
