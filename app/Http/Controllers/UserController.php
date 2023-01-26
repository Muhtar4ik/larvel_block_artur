<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        dd($users);
    }

    public function show($id ) {
        $user = User::query()->find($id)->get();
        dd($user);
    }
}
