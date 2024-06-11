<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Post;

class ArticleController extends Controller
{
    public function index()
    {
        $users = User::all();
        $posts = Post::all();
        return view('articles.index', compact('users', 'posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
  
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

  

    public function blog_list()
    {
        $articles = Article::with('user', 'post')->get();
    
        return view('articles.blog', compact('articles'));
    }

}
