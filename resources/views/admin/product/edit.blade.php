@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/products/add/add.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'product', 'key' => 'Edit'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('product.update', ['id' => $product->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name"
                                       value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="price"
                                       value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label>Ảnh minh họa</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                                <div class="col-md-12 feature_image_container">
                                    <div class="row">
                                        <img class="feature_image" width="100%" height="130px"
                                             src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        @foreach($product->ProductImages as $productImagesItem)
                                            <div class="col-md-12">
                                                <img class="image_detail_product" width="100%" height="130px"
                                                     src="{{$productImagesItem->image_path}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>--Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!!$htmlOptions !!}
                                </select>
                            </div>
                            <label>Tags sản phẩm</label>
                            <select name="tags[]" class="form-control  tags_select_choose" multiple="multiple">
                                @foreach($product->tags as$tagItem)
                                    <option value="{{$tagItem->name}}" selected>{{$tagItem->name    }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label>Nhập mô tả sản phẩm</label>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Content</label>
                                <textarea name="contents" class="form-control "
                                          id="editor1">{{$product->content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Add product</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        }); </script>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/products/add/add.js')}}"></script>

    {{--    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
@endsection


