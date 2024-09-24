<?php

namespace App\Http\Requests\Cart;

use App\Models\CartItems;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CartUpdateRequest extends FormRequest
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
            'quantity' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) {
                    $cartItem = CartItems::findOrFail($this->id);
                    $product = Products::find($cartItem->product_id);

                    // Проверяем доступное количество товара
                    if ($value > $product->quantity) {
                        $fail("Запрошенное количество превышает доступный запас. Максимальное доступное количество: {$product->quantity}.");
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.required',
        ];
    }
}
