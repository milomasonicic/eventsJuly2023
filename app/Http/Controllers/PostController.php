<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Events\PostCreation;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function create()
    {
        return view("postCreate", [
            "users"=> User::all()
        ]);
    }

    public function store (Request $request)
    {
        $data = $request->validate([
            "title"=>"required",
            "body"=>"required",
            "users_id"=>"required"
        ]);

        $post = Post::create($data);

        event(new PostCreation($post));
        return redirect()->back();
    }
}
