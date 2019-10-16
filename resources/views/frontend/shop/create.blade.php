@extends('backend.layouts.master')

@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tạo danh mục sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Danh mục sản phẩm</a></li>
                        <li class="breadcrumb-item active">Tạo danh mục</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- Content -->
@endsection

@section('content')
    <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tạo danh mục sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" id="" placeholder="Điền tên danh mục sản phẩm ">
                                </div>
                                <div class="form-group">
                                    <label>Hãng</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option>--Chọn hãng---</option>
                                        <option>Iphone</option>
                                        <option>Samsung</option>
                                        <option>Oppo</option>
                                        <option>Xiaomi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" id="" placeholder="Điền số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                    <textarea class="textarea" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                                <button type="submit" class="btn btn-sucess">Tạo mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection