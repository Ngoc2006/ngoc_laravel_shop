@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                    <li class="breadcrumb-item active">Tạo mới</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
<!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    {{--  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form role="form" method="post" action="{{ route('backend.category.store') }}">
@csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Điền tên danh mục sản phẩm">
            </div>

             @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


          {{--   <div class="form-group">
                <label for="exampleInputEmail1">Slug danh mục</label>
                <input type="text" name="slug" class="form-control" id="" placeholder="Điền slug danh mục">
            </div> --}}



            <div class="form-group">
                <label for="exampleInputEmail1">Parent_id</label>
                <input type="text" name="parent_id" class="form-control" id="" placeholder="Điền danh mục cha">
            </div>

             @error('parent_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror



            <div class="form-group">
                <label for="exampleInputEmail1">Depth</label>
                <input type="text" name="depth" class="form-control" id="" placeholder="Điền path danh mục">
            </div>

             @error('depth')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
<!-- /.card-body -->

<div class="card-footer">
    <a href="{{ route('backend.category.index') }}" class="btn btn-default">Huỷ bỏ</a>
    <button type="submit" class="btn btn-success">Tạo mới</button>
</div>
</form>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection