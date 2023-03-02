<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingInRequest;
use App\Http\Requests\SingUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthControlle extends Controller
{
    public function signup(SingUpRequest $request)
    {

        $request['password'] = Hash::make($request['password']);

        $user = User::query()->create([
            'password' => Hash::make($request['password'])
        ] + $request->validated());

        Auth::login($user);

        return redirect()->route('home');

    }

    public function signin(SingInRequest $request)
    {
        

        if (!Auth::attempt($request->validated())) {
            return back()
            ->withErrors(['invalid' => 'Invalid credentials'])
            ->withInput($request->all());
        }


        if (Auth::user()->role == 'banned') {
            Auth::logout();

            return back()
            ->withErrors(['banned' => 'You are has been blocked! ;3'])
            ->withInput($request->all());
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
