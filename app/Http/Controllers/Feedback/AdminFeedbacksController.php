<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Requests\Feedback\AdminFeedbackRequest;
use App\Models\Feedbacks;

class AdminFeedbacksController extends BaseController
{
    public function index()
    {
        $feedbacks = Feedbacks::with('user')->get();
        $table = 'feedbacks';
        return view('pages.adminFeedback', compact('feedbacks', 'table'));
    }

    public function store(AdminFeedbackRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->back();
    }
}
