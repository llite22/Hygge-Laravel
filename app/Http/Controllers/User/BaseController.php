<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;

class BaseController extends Controller
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
