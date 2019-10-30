<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){
        // check cho tài khoản đang đăng nhập
        if(Gate::allows('view-dashboard')){
            return view('backend.dashboard');
        }else{
            return abort(404);
        }

        
    }
}
