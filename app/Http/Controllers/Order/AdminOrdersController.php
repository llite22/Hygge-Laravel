<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\OrderRequest;
use App\Models\Orders;

class AdminOrdersController extends BaseController
{
    public function index()
    {
        $order_items = Orders::with(['orderItems.product', 'user'])->get();
        return view('pages.adminOrders', compact('order_items'));
    }


    public function edit($id)
    {
        $order = Orders::find($id);
        return view('admin.component.order.edit', compact('order'));
    }


    public function update(OrderRequest $request)
    {
        $this->service->update($request->all(), $request->id);
        $order_items = Orders::with(['orderItems.product', 'user'])->get();
        return view('pages.adminOrders', compact('order_items'));
    }


    public function destroy($id)
    {
        Orders::destroy($id);
        return redirect()->back();
    }
}
