<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // or you can use the middleware like this
    /**
    public function __construct() {
        $this->middleware(['auth']);
    }
     */


    public function index() {

        /** this returns the all info regarding the authenticated user */
        // dd(auth()->user());

        /** this returns only name of authenticated user. */
        // dd(auth()->user()->name);

//        dd(auth()->user()->posts);

        return view('dashboard.dashboard');
    }
}
