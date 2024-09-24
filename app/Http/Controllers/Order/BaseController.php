<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;

class BaseController extends Controller
{
    public $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }
}
