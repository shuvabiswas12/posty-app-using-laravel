<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.register');
    }
    public function store(Request $request) {
        //        dd("abc");  // dd() => means "die dump"

        // store the user
        // store the user in
        // redirect

        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
        ]);

        // or you can write here such
        // "auth()->attempt(['email' => $request->email, 'password'=>$request->password])
        // instead bellow this line.
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');

    }
}
