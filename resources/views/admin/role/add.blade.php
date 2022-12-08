@extends('layouts.admin')

@section('title')
    <title>Roles</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/Banners/add/add.css')}}">
    <style>
        .card-header{
            background-color: #00A000;
        }
    </style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Roles', 'key' => 'Add'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" style="width: 100%">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên vai trò"
                                       name="name"
                                       value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea class="form-control"
                                          name="descriptions"
                                          rows="4">
                                    {{old('display_name')}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">

                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label for="">
                                                <input type="checkbox" value="">
                                            </label>
                                            module sp
                                        </div>
                                        <div class="row">
                                            @for($i = 1; $i <= 4; $i++)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label for="">
                                                            <input type="checkbox" value="">
                                                        </label>
                                                        Thêm sản phẩm
                                                    </h5>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



