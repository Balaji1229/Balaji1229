<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;

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
      
 
        $array = ['first' => 'james', 'last' => 'kirk'];
        
        $mapped = Arr::map($array, function (string $value, string $key) {

            // dd($key);

        return ucfirst($value);
});
 
         
        return $mapped;
         
       
      
     
         
       
 
     }

 
}


