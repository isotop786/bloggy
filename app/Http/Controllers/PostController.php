<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index']);
    }

    public function index()
    {
        $post = Post::orderBy('id','desc')->paginate(10);

        return view('post.index')->with('post',$post);
    }

    public function single($id)
    {
        $post = Post::find($id);

        return view('post.single')->with('post',$post);
    }

    public function create()
    {
        $cat = Category::all();

        return view('post.create')->with('category',$cat);
    }

    public function store(Request $request)
    {
        dd($request->input('category'));
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }


}
