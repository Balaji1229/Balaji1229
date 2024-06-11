<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use App\Models\User;

use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;



class FrontendController extends Controller
{
    
    public function home(){
        return view('frontend.index');
    }


 

    public function about() {
        $users = User::all(); 
        
        $user_data = "";
        
        foreach ($users as $user) {
            $user_data .= $user->name . "\n";
        }
        
        return $user_data;
    }
    

 
}


