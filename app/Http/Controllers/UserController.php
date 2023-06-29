<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request) {
        $inputFields = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $inputFields['loginName'], 'password' => $inputFields['loginPassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }
    public function logout() {
        auth()->logout();
        return redirect('/');
    }
    public function register(Request $request) {
        $inputFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);

        $inputFields['password'] = bcrypt($inputFields['password']);
        $user = User::create($inputFields);

        auth()->login($user);

        return redirect('/');
    }
}
