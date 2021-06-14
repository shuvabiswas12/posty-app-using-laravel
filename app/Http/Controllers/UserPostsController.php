<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    //
    public function index(User $user) {
        $post = $user->posts()->orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);

        return view("profile.user-profile", [
            'user'=>$user,
            'posts'=>$post,
        ]);
    }
}
