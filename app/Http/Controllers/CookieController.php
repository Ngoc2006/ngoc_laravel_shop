<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function set(){
        // $response = new Response();
        // $response->withCookie(cookie('name', 'Ngọc'));
        Cookie::queue('user_id', 1);
        Cookie::queue('email', 'ngocnguyen@gmail.com');
        return response('Hello')->cookie('giohang', '1', 10);
    }

    public function get(Request $request){
        //cach 1
        // $value = $request->cookie('name');
        // $user = $request->cookie('user_id');
        // $laravel = $request->cookie('laravel_session');
        //cach2
        $value = Cookie::get('giohang');
        $email = Cookie::get('email');
        $user = Cookie::get('user_id');
        $laravel = Cookie::get('laravel_session');
        echo $laravel . "\n";
        echo $value;
        echo $user;
        echo $email;
    }
}
