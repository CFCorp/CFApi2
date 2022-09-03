<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CustomAuthController extends Controller
{
    private function getCount($name){
        $count = DB::scalar("SELECT count(*) as cnt FROM $name");
    
        return $count;
    }
 
    public function dashboard()
    {
        
        if(Auth::check()){
            $names = array("anime", "baguette", "dva", "hentai", "hug", "trap", "neko", "nsfwneko", "yuri");

            foreach ($names as $key => $name){
                $data[] = $this->getCount($name);
            }
            $token = array('token' => (new DashboardController)->getUserToken());
            $combination = array_combine($names, $data);
            $combi = array_merge($combination, $token);
    
    
            return view('dashboard')->with($combi);
        } else{
            return redirect("login")->withSuccess('are not allowed to access');
        }
   
        
    }


    public function settings()
    {
        if(Auth::check()){
            return view('settings');
        }
        else {
            return redirect("login")->withSuccess('are not allowed to access');
        }
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}
