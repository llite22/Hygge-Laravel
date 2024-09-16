<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;


class AdminOrdersController extends Controller
{
    public function index()
    {

        return view('pages.adminOrders');
    }

}
