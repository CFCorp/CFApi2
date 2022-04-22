<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function updateUserToken()
    {
        $new_token = $this->tokenGen();

        DB::transaction(function($new_token)
        {
            DB::update("update users set token='" . $this->dbQuote($new_token) . "' where name='" . $this->dbQuote(Auth::user()) . "';");
        }, 5);

        return $new_token;
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
}