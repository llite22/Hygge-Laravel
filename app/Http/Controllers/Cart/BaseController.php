<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Services\Cart\CartService;

class BaseController extends Controller
{
    public $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }
}
