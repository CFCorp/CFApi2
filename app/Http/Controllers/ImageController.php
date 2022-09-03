<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    function getData($name){

        $image = DB::scalar("SELECT url FROM $name ORDER BY RANDOM() LIMIT 1");
    
        $full_link = "https://" . $name .  ".computerfreaker.pw/" . $image;
        
        return $full_link;
        
    }

    public function showAnImage($name){
        return response()->json([
            'status' => 'success',
            'url' => getData($name)])->withHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Cache-Control' => 'no-cache',
        ]);
    }
}
