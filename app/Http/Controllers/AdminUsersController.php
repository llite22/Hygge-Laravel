<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.adminUsers', compact('users'));
    }

    public function edit(UserRequest $request)
    {
        $id = $request->segment(4);
        $user = User::findOrFail($id);
        if (!ctype_digit($id)) {
            abort(404);
        }
        return view('admin.component.user.edit', compact('user', 'id'));
    }


    public function update(UserRequest $request)
    {
        $id = $request->segment(3);
        $data = $request->all();
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect()->route('admin.users');

    }

    public function destroy(UserRequest $request)
    {
        $id = $request->segment(3);
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
