<?php

namespace App\Services\Order;


use App\Models\Orders;

class OrderService
{
    public function update(array $data, $id)
    {

        $order = Orders::find($id);

        $order->status = $data['status'];
        $order->save();

    }
}
