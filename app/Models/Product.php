<?php

namespace App\Models;
use App\User;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'products'; //trong TH đặt tên ko đúng chuẩn or nó ko nhận số nhiều
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
