<?php

namespace App\Http\Controllers;

class AdminOrdersController extends Controller
{
    public function index()
    {
        return view('pages.adminOrders');
    }

}
