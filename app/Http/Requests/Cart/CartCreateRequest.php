<?php

namespace App\Http\Requests\Cart;

use App\Models\CartItems;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CartCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => [
                'required',
                'exists:products,id',
                function ($attribute, $value, $fail) {
                    $product = Products::find($value);
                    if (!$product->available) {
                        $fail('Товар недоступен для добавления в корзину.');
                    }
                },
            ],
            'quantity' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) {
                    $product = Products::find($this->input('product_id'));
                    if ($product) {
                        $cart = Carts::firstOrCreate(['user_id' => Auth::id()]);
                        $cartItem = CartItems::where('cart_id', $cart->id)
                            ->where('product_id', $this->input('product_id'))
                            ->first();
                        $currentQuantity = $cartItem ? $cartItem->quantity : 0;
                        $totalRequestedQuantity = $currentQuantity + $value;
                        if ($totalRequestedQuantity > $product->quantity) {
                            $fail("Запрошенное количество превышает доступный запас. Максимальное доступное количество: {$product->quantity}.");
                        }
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.required',
            'product_id.required'
        ];
    }
}
