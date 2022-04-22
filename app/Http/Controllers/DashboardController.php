<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function updateUserToken()
    {
        $new_token = $this->tokenGen();
        $user = $this->getCurrentUser();

        DB::update("update users set token=" . $this->dbQuote($new_token) . " where id=" . $this->dbQuote($user->id) . ";");

        return redirect("dashboard")->withSuccess('token has been created');
    }

    private function tokenGen()
    {
        $username = $this->getCurrentUser();

        $time = getdate();
        $hashed = $username->name . $username->password . $time[0] . microtime(false) . $time['weekday'];

        return hash('sha512', $hashed . microtime(false));
    }

    private function getCurrentUser()
    {
        return DB::table('users')->where('id', Auth::user()->getAuthIdentifier())->first();
    }

    private function dbQuote($string)
    {
        return DB::connection()->getPdo()->quote($string);
    }

    public function getUserToken(){
        return DB::table('users')->select('token')->where('id', Auth::user()->getAuthIdentifier())->get();
    }
}