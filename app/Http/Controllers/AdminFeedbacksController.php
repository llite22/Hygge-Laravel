<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminFeedbackRequest;
use App\Models\Feedbacks;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminFeedbacksController extends Controller
{
    public function index()
    {
        $feedbacks = Feedbacks::all();
        $table = 'feedbacks';
        return view('pages.adminFeedback', compact('feedbacks', 'table'));
    }

    public function store(AdminFeedbackRequest $request)
    {
        $password = Str::random(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password)
        ]);

        $user->save();

        Mail::raw('Your password is: ' . $password, function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Your Account Password');
        });


        $feedback = Feedbacks::where('email', $request->email)->first();
        if ($feedback) {
            $feedback->status = true;
            $feedback->save();
        }

        $feedbacks = Feedbacks::all();
        return view('pages.adminFeedback', compact('feedbacks'));
    }
}
