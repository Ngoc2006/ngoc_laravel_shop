<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        $categories = Cache::remember('categories', 10, function() {
            return DB::table('categories')->get();
        });
        return view('frontend.cart.index')->with('categories',$categories);
    }
}