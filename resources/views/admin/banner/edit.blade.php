@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/Banners/add/add.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Banners', 'key' => 'edit'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('banner.update', ['id' => $banner->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên banner</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nhập tên Banner" name="name" value="{{$banner->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả banner</label>
                                <textarea class="form-control @error('descriptions') is-invalid @enderror"
                                          name="descriptions"
                                          rows="4">
                                    {{$banner->descriptions}}
                                </textarea>
                                @error('descriptions')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file @error('image_path') is-invalid @enderror"
                                       name="image_path">
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="img_banner" src="{{$banner->image_path}}" alt="">
                                    </div>
                                </div>
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



