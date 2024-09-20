<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $order_items = Orders::with(['orderItems.product', 'user'])->get();
        return view('pages.adminOrders', compact('order_items'));
    }
}
