<?php

namespace App\Http\Controllers\Backend;

// use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::paginate(15);
        return view('backend.products.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //luu file
        // Storage::disk('local2')->put('file1.txt', 'Nguyen Thi Ngoc');
        // Storage::disk('local')->put('file.txt', 'Contents');
        // Storage::disk('local')->put('file.txt', 'Contents');
        Storage::disk('public')->put('test1.txt', 'ngoc');

        //lay file
        // $contents = Storage::get('test1.txt');
        // $url = $contents = Storage::disk('public')->url('test1.txt');

        //copy
        // $contents = Storage::disk('public')->copy('test1.txt','test2.txt');

        //move
        // $contents = Storage::disk('public')->move('test1.txt','file/test3.txt');


        // dd($contents);


        // $exists = Storage::disk('local')->exists('test1.txt');
        // dd($contents);

        //check ton tai file
        // if(Storage::disk('local')->exists('test1.txt')){
        //     dd(0);
        // }else{
        //     dd(1);
        // }

        //download file
        // return Storage::download('test1.txt');

        // dd(1);
        $categories = Category::get();
        return view('backend.products.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // StoreProduct
        //Cách 1:

        // $validatedData = $request->validate([
        //     'name'         => 'required|min:10|max:255',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        // ]);

        //Cách 3: tự tạo validator
        // $validator = Validator::make($request->all(),
        // [
        //     'name' => 'required|min:10|max:255',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        // ],
        // [
        //     'required' => ':attribute Không được để trống',
        //     'min' => ':attribute Không được nhỏ hơn :min',
        //     'max' => ':attribute Không được lớn hơn :max'
        // ],
        // [
        //     'name' => 'Tên sản phẩm',
        //     'origin_price' => 'Giá gốc',
        //     'sale_price' => 'Giá bán'
        // ]
        // );
        // if ($validator->errors()){
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        $info_images = [];
        if ($request->hasFile('images')){

            //Cachs 1: luu anh vao storage
            // $file = $request->file('image');
            // // Lưu vào trong thư mục storage
            // $path = $file->store('images');

            //cachs 2: luu anh vao public
            // $file = $request->file('image');
            // $name = $file->getClientOriginalName();
            // $file->move('image_2', $name);

            //truong hop luu nhieu file anh
            // dd(2);
            $images = $request->file('images');
            foreach($images as $key => $image){
                $id = $key + 1;
                // $username = $key;
                $namefile = $id . '.png';
                // $namefile = $image->getClientOriginalName(); //lay ten goc ban dau
                $url = 'storage/' . $namefile;
                // $file -> store('images');
                Storage::disk('public')->putFileAs('products', $image, $namefile);
                $info_images[]=[
                    'url'=> $url,
                    'name' => $namefile,
                ];
            }
        }else{
            dd('khong co file');
        }

        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        // $product->content = 'Ngọc Xinh Gái';
        $product->content = $request->get('content');;
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;


        

        // dd($product);
        $product->save();
        foreach($info_images as $image){
            $img = new Image();
            $img->name = $image['name'];
            $img->path = $image['url'];
            $img->product_id = $product->id;
            // dd($img);
            $img->save();

        }

        return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::find($id);
        // dd($item);
        return view('backend.products.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Lấy dữ liệu với id
        $product = Product::find($id);
        //Lấy dữ liệu categories
        $categories = Category::get();
        //Gọi đến view edit
        return view('backend.products.edit')->with('product', $product)->with(['categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Nhận dữ liệu từ $request
        $name = $request->get('name');
        $slug = $request->get('slug');
        $category_id = $request->get('category_id');
        $origin_price = $request->get('origin_price');
        $sale_price = $request->get('sale_price');
        $content = $request->get('content');
        // $image = $request->get('image');

        //Tìm product tương ứng với id
        $product = Product::find($id);
        //Cập nhật dữ liệu mới
        $product->name = $name;
        $product->slug = $slug;
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $category_id;
        $product->origin_price = $origin_price;
        $product->sale_price = $sale_price;
        $product->content = $content;

         // Lưu dữ liệu
         $product->save();
         //Chuyển hướng đến trang danh sách
         return redirect()->route('backend.product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xoá với id tương ứng
        Product::destroy($id);
        // Chuyển hướng về trang danh sách
        return redirect()->route('backend.product.index');
    }
}
