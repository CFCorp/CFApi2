<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CustomAuthController;


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

Route::get('/v2/anime', function (Request $request) {
    return image('anime');
})->name('anime');

Route::get('/v2/baguette', function (Request $request) {
    return image('baguette');
})->name('baguette');

Route::get('/v2/dva', function (Request $request) {
    return image('dva');
})->name('dva');

Route::get('/v2/hentai', function (Request $request) {
    return image('hentai');
})->name('hentai');

Route::get('/v2/hug', function (Request $request) {
    return image('hug');
})->name('hug');

Route::get('/v2/neko', function (Request $request) {
    return image('neko');
})->name('neko');

Route::get('/v2/nsfwneko', function (Request $request) {
    return image('nsfwneko');
})->name('nsfwneko');

Route::get('/v2/trap', function (Request $request) {
    return image('trap');
})->name('trap');

Route::get('/v2/yuri', function (Request $request) {
    return image('yuri');
})->name('yuri');


Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');