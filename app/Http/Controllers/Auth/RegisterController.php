<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\ContactJob;
use App\Jobs\ContacttwoJob;

use App\Jobs\ProcessUserRegistration;
use App\Mail\HelloMail;
use Illuminate\Http\Request;
use App\Events\UserRegistered;

use Illuminate\Support\Facades\Mail;


use App\Models\Post;
use App\Models\Contact;

use Illuminate\Pipeline\Pipeline;
use App\Pipes\CheckTitle;
use App\Pipes\TrimContent;
use App\Pipes\UppercaseTitle;
use App\Pipes\PrependHelloWorld;







class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        ProcessUserRegistration::dispatch($validatedData);
    
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
                // PrependHelloWorld::class,
            ])
            ->thenReturn();


        $post_data = Post::create($processedData);

        return redirect()->route('post')->with('success', 'Post created successfully!');

    }



    //////////////////////////////////// Lazy Loading & Eagar Loading //////////////////////////////


    //lazy

    public function post_post_one() {
        $posts = Post::all();
        $data = [];
        foreach ($posts as $post) {
        $data[] = $post->title; 
    }
        return $data;
    }
   

    //Eager

    public function post_post() {
        $posts = Post::all(['title']);  
        return $posts;
    }
    

//////////////////////////////////// Queus Jobs ////////////////////////////////////////////////
    
public function contact_us(){
    return view('contact.contact');
}


public function contact_data(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    try {
  
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->address = $validatedData['address'];
        $contact->message = $validatedData['message'];
        $contact->save();

        event(new UserRegistered($validatedData['email'], $validatedData['name']));

        return redirect()->back()->with('success', 'Your message has been submitted successfully!');


    } catch (\Exception $e) {
     
        return redirect()->back()->with('error', 'Failed to submit your message. Please try again later.');
    }
}


/////////////////////////////// Mail Testing //////////////////////////////////////////////////////////////// 

public function mail() {
   Mail::to('balaji.n@targetbay.com')->send(new HelloMail());
}

    
    }
 