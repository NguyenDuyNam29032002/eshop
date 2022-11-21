@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/products/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'product', 'key' => 'Add'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name">
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="price">
                            </div>
                            <div class="form-group">
                                <label>Ảnh minh họa</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>--Chọn danh mục</label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!!$htmlOptions !!}
                                </select>
                            </div>
                            <label>Tags sản phẩm</label>
                            <select name="tags" class="form-control  tags_select_choose" multiple = "multiple">

                            </select>
                            <div class="form-group">
                                <label>Nhập mô tả sản phẩm</label>
                                <textarea id="editor1" class="form-control" rows="3" name="content"></textarea>
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

@section('js')
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin/products/add/add.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
@endsection

