<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        // or you can write here such
        // "auth()->attempt(['email' => $request->email, 'password'=>$request->password])
        // instead bellow this line.
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {

            // here back() function redirect the page last visited page.
            // here with() function takes a message which is a flash message.
            // 'status' => "Invalid login details"

            return back()->with('status', "Invalid login details");
        }

        return redirect()->route('dashboard');
    }
}
