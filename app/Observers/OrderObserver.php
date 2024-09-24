<?php

namespace App\Observers;

use App\Models\Orders;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Handle the Orders "created" event.
     */
    public function created(Orders $orders): void
    {
        Mail::send('status.status', ['order' => $orders->id, 'status' => $orders->status], function ($message) use ($orders) {
            $message->to($orders->user->email)
                ->subject('Ваш заказ успешно создан');
        });
    }

    /**
     * Handle the Orders "updated" event.
     */
    public function updated(Orders $orders): void
    {
        if ($orders->isDirty('status')) {

            switch ($orders->status) {
                case 'отправлен':
                    Mail::send('status.status', ['order' => $orders->id, 'status' => $orders->status], function ($message) use ($orders) {
                        $message->to($orders->user->email)
                            ->subject('Заказ отправлен');
                    });
                    break;
                case 'доставлен':
                    Mail::send('status.status', ['order' => $orders->id, 'status' => $orders->status], function ($message) use ($orders) {
                        $message->to($orders->user->email)
                            ->subject('Заказ доставлен');
                    });
                    break;
                case 'отменен':
                    Mail::send('status.status', ['order' => $orders->id, 'status' => $orders->status], function ($message) use ($orders) {
                        $message->to($orders->user->email)
                            ->subject('Заказ отменен');
                    });
                    break;
            }
        }
    }

    /**
     * Handle the Orders "deleted" event.
     */
    public
    function deleted(Orders $orders): void
    {
        //
    }

    /**
     * Handle the Orders "restored" event.
     */
    public
    function restored(Orders $orders): void
    {
        //
    }

    /**
     * Handle the Orders "force deleted" event.
     */
    public
    function forceDeleted(Orders $orders): void
    {
        //
    }
}
