@extends('backend.layouts.master')
@section('title')
    Category
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh mục sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh mục</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <!-- Content -->
<div class="container-fluid">
    <form action="{{ route('backend.category.update', $item->id) }}" method="POST" class="" role="form">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        {{--{{ method_field('PUT') }}--}}
        <div class="form-group">
            <legend>Cập nhật danh mục</legend>
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Tên danh mục:</label>
            <input name="name" type="text" value="{{ $item->name }}" class="form-control" id="todo" placeholder="Enter todo">
        </div>

        <div class="form-group">
            <label class="control-label" for="todo">Slug danh mục:</label>
            <input name="slug" type="text" value="{{ $item->slug }}" class="form-control" id="todo" placeholder="Enter todo">
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Parent_id:</label>
            <input name="parent_id" type="text" value="{{ $item->parent_id }}" class="form-control" id="todo" placeholder="Enter todo">
        </div>


        <div class="form-group">
            <label class="control-label" for="todo">Depth:</label>
            <input name="depth" type="text" value="{{ $item->depth }}" class="form-control" id="todo" placeholder="Enter todo">
        </div>
        <div class="form-group">
            <div class="">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection