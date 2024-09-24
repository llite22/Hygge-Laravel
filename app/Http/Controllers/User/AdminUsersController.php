<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;

class AdminUsersController extends BaseController
{
    public function index()
    {
        $users = User::all();
        return view('pages.adminUsers', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.component.user.edit', compact('user'));
    }


    public function update(UserUpdateRequest $request)
    {
        $this->service->update($request->all());
        return redirect()->route('admin.users')->with('success', 'Пользователь обновлен');

    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
