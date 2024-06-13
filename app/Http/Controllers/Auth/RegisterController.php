<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessUserRegistration;
use Illuminate\Http\Request;


use App\Models\Post;
use Illuminate\Pipeline\Pipeline;
use App\Pipes\CheckTitle;
use App\Pipes\TrimContent;
use App\Pipes\UppercaseTitle;




class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        ProcessUserRegistration::dispatch($request->all());

        return redirect()->route('register')->with('status', 'Registration successful! Check your email for confirmation.');
    }



/////////////////////////// post - Pipeline ///////////////////////////////////

    public function post(){
        return view('post.post');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $data = $request->all();


        $processedData = app(Pipeline::class)
            ->send($data)
            ->through([
                CheckTitle::class,
                TrimContent::class,
                UppercaseTitle::class,
            ])
            ->thenReturn();


        $post_data = Post::create($processedData);

        return redirect()->route('post')->with('success', 'Post created successfully!');

    }

}
