@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    @if (session()->has('success'))
        <span style="color: green">{!! session()->get('success') !!}</span>
    @endif

    @if (session()->has('fail'))
        <span style="color: red">{!! session()->get('fail') !!}</span>
    @endif

    @if (session()->has('fail_update'))
        <span style="color: red">{!! session()->get('fail_update') !!}</span>
    @endif

    @if (session()->has('success_update'))
        <span style="color: green">{!! session()->get('success_update') !!}</span>
    @endif
@endsection


@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục mới nhập</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Parent_id</th>
                                <th>Hành động</th>
                                <th>Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>
                                        
                                        <a style="display: inline-block; width: 67px;" href="{{ route('backend.category.edit',$category->id) }}" class="btn btn-warning">Edit</a>

                                        <form style="display: inline-block;" action="{{ route('backend.category.destroy', $category->id) }}" method="post" accept-charset="utf-8">
                                        @csrf
                                            {{method_field('delete')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $categories->links() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection