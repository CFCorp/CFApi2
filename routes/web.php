<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;


function getData($name){

    $image = DB::scalar("SELECT url FROM $name ORDER BY RANDOM() LIMIT 1");

    $full_link = "https://" . $name .  ".computerfreaker.pw/" . $image;
    
    return $full_link;
    
};

function image($name) {
    return response()->json(['url' => getData($name)])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
}

function getCount($name){
    $count = DB::scalar("SELECT count(*) as cnt FROM $name");

    return $count;
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
Route::get('dashboard', function () {
    $names = array("anime", "baguette", "dva", "hentai", "hug", "trap", "neko", "nsfwneko", "yuri");

    foreach ($names as $key => $name){
        $data[] = getCount($name);
    }

    $combi = array_combine($names, $data);

    return view('dashboard')->with($combi);
})->name('dashboard');
Route::get('dashboard', [DashboardController::class, 'updateUserToken'])->name('updateUserToken');
Route::get('settings', function () {
    return view('settings');
})->name('settings');