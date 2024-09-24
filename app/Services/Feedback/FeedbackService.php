<?php

namespace App\Services\Feedback;

use App\Models\Carts;
use App\Models\Feedbacks;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FeedbackService
{
    public function store(array $data)
    {
        $password = Str::random(10);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password)
        ]);

        Mail::send('emails', ['name' => $data['name'], 'password' => $password], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Ваш пароль от аккаунта. Добро пожаловать!');
        });
        Carts::firstOrCreate(['user_id' => $user->id]);

        $feedback = Feedbacks::where('email', $data['email'])->first();
        $feedback->status = true;
        $feedback->save();
    }
}
