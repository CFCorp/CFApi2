<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;


function getData($name){

    $image = DB::scalar("SELECT url FROM $name ORDER BY RANDOM() LIMIT 1");

    $full_link = "https://" . $name .  ".computerfreaker.pw/" . $image;
    
    return $full_link;
    
};

function image($name) {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user != null) {
            $token = DB::table('users')->select('token')->where('id', $user->getAuthIdentifier())->value("token");
            if ($token != null && trim($token) !== '') {
                return response()->json(['url' => getData($name)])->withHeaders([
                    'Access-Control-Allow-Origin' => '*',
                    'Cache-Control' => 'no-cache',
                ]);
            }
        }
    }
    return abort(403);
}

function apiImage($name, $token) {
    if ($token != null && trim($token) !== '') {
        $stored_token = DB::table('users')->select('token')->where('token', $token)->value("token");
        if ($stored_token != null && trim($stored_token) !== '') {
            return response()->json(['url' => getData($name)])->withHeaders([
                'Access-Control-Allow-Origin' => '*',
                'Cache-Control' => 'no-cache',
            ]);
        }
    }
    return abort(403);
}



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('v2')->group(function (){
    Route::get('anime', function (Request $request) {
        return image('anime');
    })->name('anime');
    
    Route::get('baguette', function (Request $request) {
        return image('baguette');
    })->name('baguette');
    
    Route::get('dva', function (Request $request) {
        return image('dva');
    })->name('dva');
    
    Route::get('hentai', function (Request $request) {
        return image('hentai');
    })->name('hentai');
    
    Route::get('hug', function (Request $request) {
        return image('hug');
    })->name('hug');
    
    Route::get('neko', function (Request $request) {
        return image('neko');
    })->name('neko');
    
    Route::get('nsfwneko', function (Request $request) {
        return image('nsfwneko');
    })->name('nsfwneko');
    
    Route::get('trap', function (Request $request) {
        return image('trap');
    })->name('trap');
    
    Route::get('yuri', function (Request $request) {
        return image('yuri');
    })->name('yuri');
    
});



Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::post('dashboard-generate', [DashboardController::class, 'updateUserToken'])->name('dashboard.generate');
Route::get('settings', [CustomAuthController::class, 'settings'])->name('settings');
//Route::get('settings/{current_password}/{new_password}/{confirmed_password}', [SettingsController::class, 'changeUserPassword'])->name('settings.password');