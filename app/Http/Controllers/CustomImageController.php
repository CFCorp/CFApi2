<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    function getData($name){

        $image = DB::scalar("SELECT url FROM $name ORDER BY RANDOM() LIMIT 1");
    
        $full_link = "https://" . $name .  ".computerfreaker.pw/" . $image;
        
        return $full_link;
        
    }

    public function showAnImage(Request $request){
        return response()->json(['url' => getData('')])->withHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Cache-Control' => 'no-cache',
        ]);
    }


}
