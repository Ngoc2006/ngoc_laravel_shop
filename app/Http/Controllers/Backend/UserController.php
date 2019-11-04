<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        // $users = User::simplePaginate(15);
        // $users = User::get();
        return view('backend.users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
		$email = $request->get('email');
		$password = $request->get('password');
		//dd($name);
		$user = new User();
		$user->name = $request->get('name');
		// $user->slug = \Illuminate\Support\Str::slug($request->get('name'));
		//      $category->category_id = $request->get('category_id');
		//      $category->origin_price = $request->get('origin_price');
		//      $category->sale_price = $request->get('sale_price');
		$user->email = $request->get('email');
		$user->password = bcrypt($request->password);
//      $category->user_id = Auth::user()->id;
		//dd($user);
		$user->save();
		$save = $user->save();
		if ($save) {
			$request->session()->flash('success', 'Tạo user thành công' . '<br>');
		} else {
			$request->session()->flash('fail', 'Tạo user thất bại' . '<br>');
		}
		return redirect()->route('backend.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::find($id);
        // dd($item);
        return view('backend.users.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
        User::destroy($id);
        // Chuyển hướng về trang danh sách
        return redirect()->route('backend.user.index');
    }
}
