<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;


function getData($name){

    $image = DB::scalar("SELECT url FROM $name ORDER BY RANDOM() LIMIT 1");

    $full_link = "https://" . $name .  ".computerfreaker.pw/" . $image;
    
    return $full_link;
    
};

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
    return view('welcome');
});

Route::get('/v2/anime', function (Request $request) {
    return response()->json(['url' => getData('anime')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/baguette', function (Request $request) {
    return response()->json(['url' => getData('baguette')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/dva', function (Request $request) {
    return response()->json(['url' => getData('dva')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/hentai', function (Request $request) {
    return response()->json(['url' => getData('hentai')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/hug', function (Request $request) {
    return response()->json(['url' => getData('hug')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/neko', function (Request $request) {
    return response()->json(['url' => getData('neko')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/nsfwneko', function (Request $request) {
    return response()->json(['url' => getData('nsfwneko')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/trap', function (Request $request) {
    return response()->json(['url' => getData('trap')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});

Route::get('/v2/yuri', function (Request $request) {
    return response()->json(['url' => getData('yuri')])->withHeaders([
        'Access-Control-Allow-Origin' => '*',
        'Cache-Control' => 'no-cache',
    ]);
});
