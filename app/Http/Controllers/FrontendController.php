<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;



class FrontendController extends Controller
{
    
    public function home(){
        return view('frontend.index');
    }



<<<<<<< HEAD
//this is my second modification

=======

//this is my first modification 
>>>>>>> dev




    public function about(){
      
        $array = [
            'user.name' => 'Kevin Malone',
            'user.occupation' => 'Accountant',
        ];
         
        $array = Arr::undot($array);

        return $array;



                }

 
}



// Hi Hellloooooooooooooooooooooooooooo