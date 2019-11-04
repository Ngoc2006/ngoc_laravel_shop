<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function set(){
        session([
            'user_id' => '445',
            'name' => 'Ngọc',
        ]);
        session()->put('age', 18);
    }
    public function get(){
        $value = session()->get('user_id');
        $name = session()->get('name');
        $age = session()->get('age');

        $phone= session()->get('phone', '123456');
        //check xem nó có được đư avaof set chưa?
        // if(session()->has('age')){
        //     echo 'co';
        // }else{
        //     echo 'khong';
        // }

        // if(session()->exists('phone')){
        //     echo 'co';
        // }else{
        //     echo 'khong';
        // }


        dd(session()->all());
        echo 'Name:' .$name;

        echo 'user_id: ' . $value;
        echo 'age: ' .$age;
        echo '** Phone: ' .$phone;
        dd($value);
    }
    public function get2(){

        //hàm xóa(lấy lại) 'name'
        session()->pull('name');
        
        $name = session()->get('name');
        dd($name);
    }
}