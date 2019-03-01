<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $this->authorize('modify', $user);

        $title = __('Konto ') . $user->name;

        return view('users.edit', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('modify', $user);

        $user->setFromRequest();

        if (request('new_password')) {
            if ( ! Hash::check(request('old_password'), $user->password)) {
                return redirect()->route('users.edit', ['id' => $user->id])->with('error', __('Nieprawidłowe hasło.'))->withInput();
            }

            if (strcmp(request('old_password'), request('new_password')) == 0) {
                return redirect()->route('users.edit', ['id' => $user->id])->with('error', __('Stare i nowe hasło nie mogą być takie same.'))->withInput();
            }

            $user->setNewPasswordFromRequest();
        }

        $user->save();

        return redirect()->route('users.edit', ['id' => $user->id])->with('success', __('Zmiany zostały zapisane.'));
    }
}
