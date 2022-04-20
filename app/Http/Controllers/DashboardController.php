<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function tokenGen()
    {
        $username = DB::table('users')-where('name', Auth::user())->first();

        $time = getdate();
        $hashed = $username->name . $username->password . $time[0] . microtime(false) . $time['weekday'];

        return sha512($hashed . microtime(false));
    }

    public function getUserToken()
    {
        $username = DB::table('users')-where('name', Auth::user())->first();

        return $username->token;
    }
}