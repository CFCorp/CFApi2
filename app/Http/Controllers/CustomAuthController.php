<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    private function getCount($name){
        $count = DB::scalar("SELECT count(*) as cnt FROM $name");
    
        return $count;
    }

    public function login()
    {
        return view('loginPage');
    }  
       
 
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
   
        return redirect("login")->withSuccess('Login details are not valid');
    }
 
 
 
    public function registration()
    {
        return view('registration');
    }
       
 
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
        
        return redirect("login");
    }
 
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
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
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}
