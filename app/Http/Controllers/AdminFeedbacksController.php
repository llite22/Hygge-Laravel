<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\AdminFeedbackRequest;
use App\Models\Carts;
use App\Models\Feedbacks;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AdminFeedbacksController extends Controller
{
    public function index()
    {
        $feedbacks = Feedbacks::with('user')->get();
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

        Mail::send('emails', ['name' => $request->name, 'password' => $password], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Ваш пароль от аккаунта. Добро пожаловать!');
        });
        Carts::create(['user_id' => $user->id]);

        $feedback = Feedbacks::where('email', $request->email)->first();
        $feedback->status = true;
        $feedback->save();

        return redirect()->back();
    }
}
