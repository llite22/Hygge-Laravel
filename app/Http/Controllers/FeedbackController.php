<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\FeedbackRequest;
use App\Models\Feedbacks;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('pages.feedback');
    }

    public function store(FeedbackRequest $request)
    {
        Feedbacks::create($request->all());
        return redirect()->back();
    }
}
