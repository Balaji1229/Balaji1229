<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;



class FrontendController extends Controller
{
    
    public function home(){
        return view('frontend.index');
    }






//this is my first modification 





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