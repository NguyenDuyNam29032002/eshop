@extends('layouts.admin')

@section('title')
    <title>edit</title>
@endsection
@section('css')
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/user/add/add.css')}}" rel="stylesheet"/>
@endsection
@section('js')
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/user/add/add.js')}}"></script>

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Users', 'key' => 'Edit'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('users.update', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên"
                                       name="name"
                                       value="{{$user->name}}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên email"
                                       name="email"
                                       value="{{$user->email}}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Nhập tên mật khẩu"
                                       name="password"
                                >
                            </div>
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option
                                            {{$rolesOfUser -> contains('id', $role->id) ? 'selected' : ''}}
                                            value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
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



