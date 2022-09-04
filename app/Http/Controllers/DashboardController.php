<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function updateUserToken()
    {
        if(Auth::check()) {
            $new_token = $this->tokenGen();
            $user = Auth::user();

            DB::update("update users set token=" . $this->dbQuote($new_token) . " where id=" . $this->dbQuote($user->id) . ";");

            return redirect("dashboard")->withSuccess('token has been created');
        }
        else {
            return redirect("signout");
        }

    }

    private function tokenGen(Request $request)
    {
        $username = Auth::user();

        $token = Str::random(120);

        $request->user()-forceFill([
            'token' => hash('sha512', $token),
        ])->save();

        return ['token' => $token];
    }

    private function dbQuote($string)
    {
        return DB::connection()->getPdo()->quote($string);
    }

    public function getUserToken()
    {
        $user = Auth::user();
        if ($user == null) {
            return " ";
        }
        $token = DB::table('users')->select('token')->where('id', $user->getAuthIdentifier())->value("token");
        if ($token == null) {
            return " ";
        }
        return $token;
    }
}