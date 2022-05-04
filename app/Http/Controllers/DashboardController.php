<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function updateUserToken()
    {
        if(Auth::check()){
            $new_token = $this->tokenGen();
            $user = Auth::user();

            DB::update("update users set token=" . $this->dbQuote($new_token) . " where id=" . $this->dbQuote($user->id) . ";");

            return redirect("dashboard")->withSuccess('token has been created');
        }
        else {
            return redirect("signout");
        }

        
    }

    private function tokenGen()
    {
        $username = Auth::user();

        $time = getdate();
        $hashed = $username->name . $username->password . $time[0] . microtime(false) . $time['weekday'];

        return hash('sha512', $hashed . microtime(false));
    }

    private function dbQuote($string)
    {
        return DB::connection()->getPdo()->quote($string);
    }

    public function getUserToken(){
        $user = Auth::user();
        if ($user == null) {
            return " ";
        }
        $token = DB::scalar("SELECT token FROM users WHERE id=" . $this->dbQuote($user->getAuthIdentifier()) . ";");
        if ($token == null) {
            return " ";
        }
        return $token;
    }
}