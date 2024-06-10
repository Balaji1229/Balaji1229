<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;



class FrontendController extends Controller
{
    
    public function home(){
        return view('frontend.index');
    }


 











    public function about(){

        $collection = collect(['a', 'b', 'c', 'd', 'e', 'f']);

        return $collection->nth(1, 4);
 
                }

 
}



// Hi Hellloooooooooooooooooooooooooooo