@extends('layouts.admin')

@section('title')
    <title>Banner</title>
@endsection
@section('css')
   <link rel="stylesheet" href="{{asset('admins/Banners/index/index.css')}}"
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Banner', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('banner.create')}}" class="btn btn-success float-right m-3">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Banner</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <th scope="row">{{$banner->id}}</th>
                                    <td>{{$banner->name}}</td>
                                    <td>{{$banner->descriptions}}</td>
                                    <td><img class="img-banner" width="150px" height="100px" src="{{$banner->image_path}}" alt=""></td>
                                    <td>
                                        <a href="{{route('banner.edit', ['id' => $banner->id])}}"
                                           class="btn btn-success">Edit</a>
                                        <a href=""
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">

                    </div>
                    {{$banners->links()}}
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



