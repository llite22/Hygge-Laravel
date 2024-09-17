<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedbacks;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('pages.feedback');
    }

    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();
        Feedbacks::create($data);
        return redirect()->back();
    }
}
