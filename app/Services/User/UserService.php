<?php

namespace App\Services\User;

use App\Models\User;

class UserService
{
    public function update(array $data)
    {
        $user = User::findOrFail($data['id']);
        $user->update($data);
    }
}
