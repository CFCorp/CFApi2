<?php

namespace App\Http\Controllers;

use Hash;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    private function getUserEmail()
    {
        if(Auth::check()) {
            $user = Auth::user();
            if ($user != null) {
                $email = DB::table('users')->select('email')->where('id', $user->getAuthIdentifier())->value("email");
                if ($email != null && trim($email) !== '') {
                    return $email;
                }
            }
        }
        return '';
    }

    private function getUserPassword() 
    {
        if(Auth::check()) {
            $user = Auth::user();
            if ($user != null) {
                $password = DB::table('users')->select('password')->where('id', $user->getAuthIdentifier())->value("password");
                if ($password != null && trim($password) !== '') {
                    return $password;
                }
            }
        }
        return '';
    }

    public function changeUserEmail($new_email)
    {
        if(Auth::check()) {
            $user = Auth::user();
            if ($user != null) {
                DB::update("update users set email=" . $this->dbQuote($new_email) . " where id=" . $this->dbQuote($user->id) . ";");
                return true;
            }
        }
        return false;
    }

    public function changeUserPassword($current_password, $new_password, $confirmed_password)
    {
        if(Auth::check()) {
            $user = Auth::user();
            if ($user != null) {
                $password = $this->getUserPassword();
                if ($password != null && trim($password) !== '' && $password === $current_password && $new_password === $confirmed_password) {
                    $hashed_password = Hash::make($new_password);
                    DB::update("update users set password=" . $this->dbQuote($hashed_password) . " where id=" . $this->dbQuote($user->id) . ";");
                    return true;
                }
            }
        }
        return false;
    }

}