<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\CartItems;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Carts::where('user_id', Auth::id())->with(['cartItems.product'])->get();
        return view('pages.cart', compact('carts'));
    }

    public function addToCart(CartRequest $request)
    {
        // Получаем ID товара и количество из запроса
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        // Найдем товар в базе данных
        $product = Products::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Товар не найден.');
        }

        // Проверяем доступность товара
        if (!$product->available) {
            return redirect()->back()->with('error', 'Товар недоступен для добавления в корзину.');
        }

        // Получаем корзину пользователя или создаем новую, если ее нет
        $cart = Carts::firstOrCreate(['user_id' => Auth::id()]);

        // Проверяем текущее количество товара в корзине
        $cartItem = CartItems::where('cart_id', $cart->id)->where('product_id', $productId)->first();

        $currentQuantity = $cartItem ? $cartItem->quantity : 0;
        $totalRequestedQuantity = $currentQuantity + $quantity;

        // Проверяем доступное количество товара
        if ($totalRequestedQuantity > $product->quantity) {
            return redirect()->back()->with('error', 'Доступно только ' . $product->quantity . ' единиц товара.');
        }


        if ($cartItem) {
            // Если товар уже в корзине, увеличиваем количество
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Если товара нет, добавляем его в корзину
            CartItems::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Расчет общей стоимости
        $totalPrice = CartItems::where('cart_id', $cart->id)
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->sum(DB::raw('cart_items.quantity * products.price'));

        // Обновляем поле total_price в корзине
        $cart->total_price = $totalPrice;
        $cart->save();

        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину.');
    }

    public function update(CartRequest $request, $cartItemId)
    {
        $request->all();

        $cartItem = CartItems::findOrFail($cartItemId);

        $product = Products::find($cartItem->product_id);

        // Проверяем доступное количество товара
        if ($request->input('quantity') > $product->quantity) {
            return redirect()->back()->with('error', 'Доступно только ' . $product->quantity . ' единиц товара.');
        }

        // Обновляем количество товара
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        // Пересчитываем общую стоимость корзины
        $cart = Carts::find($cartItem->cart_id);
        $totalPrice = CartItems::where('cart_id', $cart->id)
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->sum(DB::raw('cart_items.quantity * products.price'));

        $cart->total_price = $totalPrice;
        $cart->save();

        return redirect()->back()->with('success', 'Количество товара обновлено.');
    }


}
