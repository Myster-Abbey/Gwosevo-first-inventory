<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // Show Register/Create Form
    public function index()
    {
        $users = User::paginate(10);
        $count = count($users);
        return view('pages.users', compact('users', 'count'));
    }

    public function show()
    {
        return view('pages.create-users');
    }

    // Create New User
    public function create(UserRequest $req)
    {
        User::create([
            'name' => $req['name'],
            'email' => $req['email'],
            'role' => $req['role'],
            'password' => Hash::make($req['password']),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        return redirect(route('users'))->with("success", "Congratulations");
    }


}
