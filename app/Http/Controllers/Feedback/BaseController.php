<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Services\Feedback\FeedbackService;

class BaseController extends Controller
{
    public $service;

    public function __construct(FeedbackService $service)
    {
        $this->service = $service;
    }
}
