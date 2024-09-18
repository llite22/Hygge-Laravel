<?php

namespace App\Http\Controllers;


use App\Http\Requests\SlidersRequest;
use App\Models\Sliders;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.adminUsers', compact('users'));
    }
}
