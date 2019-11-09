<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Cache::put('view_count', 1, 60*60);
        dd(1);
        

        // //cache voi array
        // // $put = Cache::put('name', ['ngoc' => 1, 'Nga' => 2], 60*4);

        // //cache voi string
        // // $put = Cache::put('name', 'Ngoc', 60*4);

        // //cache voi doi tuong
        // // $cate = Category::find(5);
        // // $put = Cache::put('cate', $cate, 60*4);

        // //Nhieu doi tuong
        // $categories = Category::get();
        // $put = Cache::put('categories', $categories, 60*4);

        // //cache voi int
        // // Cache::put('age','23', 15);

        // // dd(Cache::add('name', 'N', 60*1));

        // dd($put);

        return view('frontend.index');
    }
    public function getCache(){
        //Hàm hay dùng nhất trong cache, hàm nhớ. Dù là 60s hay 1s thì khi hết time đó nó vẫn luôn có grti trả về của $categories
        $categories = Cache::remember('categories', 1, function(){
            // if(){

            // }else{

            // }
            return $categories = Category::get();
        });

        //Những sp đc bán chạy nhất trong 1 ngày
        $stop_products = Cache::remember('top_products',60,function(){
            return $products = Product::take(5)->get();
        });
        
        dd($categories);


        $view_count = Cache::get('view_count');
        echo $view_count . "\n";

        // //tăng 2 giảm 1 => tăng 1
        // Cache::increment('view_count');
        // Cache::increment('view_count');
        // Cache::decrement('view_count');

        // //tăng 3 => k/c = 3
        // Cache::increment('view_count');
        // Cache::increment('view_count');
        // Cache::increment('view_count');

        //tăng 1
        Cache::increment('view_count');

        $view_count = Cache::get('view_count');
        echo $view_count . "\n";


        // $name = Cache::get('name');
        // $cate = Cache::get('cate');
        // // $categories = Cache::get('categories');

        // //dung khi ben tren doi khi viet nham dan toi viec ko lay duoc $categories thi ta phai kiem tra
        // if(Cache::has('categories')){
        //     $categories = Cache::get('categories');
        // }else{
        //     // dd('loi');
        //     $categories = Category::get();
        // }
        
        // // $age = Cache::get('age' , '30');
        // // echo "age: $age";
        // // dd($name);
        // // dd($cate);
        // dd($categories);

    }
}
