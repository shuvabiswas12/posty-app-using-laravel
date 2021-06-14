<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
		// this middleware works only when user try to store and destroy posts.
		// beacuse we define "only()" function here.
		// 'only()' function takes two parameter here which are two function name. one is 'store' and 
		// another is 'destroy'
		
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index() {
        // $posts = Post::get(); // return all posts

        /** But if I use pagination then it should write as below.  */
        // this line create many query which is not good for large data.
        // $posts = Post::paginate(10);

        // this is for reducing query.
        // for details please see the laravel debugger tools

        // here you can use "latest()" instead for "orderBy()"
        // "latest()" does not take any parameter

        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(10);


        return view("posts.post", [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required',
        ]);


        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        /** we can write the create statement as like bellow. */
        // $request->user()->posts()->create($request->only('body'));

        // this back() function redirect us last page we visited!
        return back();
    }

    public function destroy(Post $post) {
//        if (!$post->ownedBy(auth()->user())) {
//            dd("no");
//        }

        // this 'delete' parameter is a method name which we defined in PostPolicy.
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }

}
