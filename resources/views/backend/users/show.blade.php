@extends('backend.layouts.master')
@section('content_header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2"> 
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">người dùng</a></li>
                    <li class="breadcrumb-item active">Tạo người dùng</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
        @csrf
        <input name="_method" type="hidden" value="PUT">
        {{--{{ method_field('PUT') }}--}}
        <div class="form-group">
            <legend>Chi tiết người dùng</legend>
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Tên người dùng:</label>
            <input name="name" type="text" value="{{ $item->name }}" class="form-control" id="todo" placeholder="Enter todo">
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Email:</label>
            <textarea name="email" class="form-control">{{ $item->email }}</textarea>
        </div>

         <div class="form-group">
            <label class="control-label" for="todo">Ngày tạo:</label>
            <input name="created_at" type="text" value="{{ $item->created_at }}" class="form-control" id="todo" placeholder="Enter todo">
        </div>

         <div class="form-group">
            <label class="control-label" for="todo">Ngày cập nhật:</label>
            <input name="updated_at" type="text" value="{{ $item->updated_at }}" class="form-control" id="todo" placeholder="Enter todo">
        </div>
</div><!-- /.container-fluid -->
@endsection