@extends('design.dangnhapuser')
@section('content')
<div class="container">
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
            </div>         
        @endif
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">ĐĂNG KÝ THÀNH VIÊN</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('user\dangki') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" placeholder="Họ và tên" name="Name" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="form-control" placeholder="Số điện thoại" name="Phone" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input style="margin-left: 100px;" type="radio" value="Nam" name="Gender" checked="checked">Nam
                                <input style="margin-left: 30px;" type="radio" value="Nữ" name="Gender">Nữ
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="form-control" placeholder="Địa chỉ" name="Address" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" placeholder="Mật khẩu" name="Pass1" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" placeholder="Xác nhận mật khẩu" name="Pass2" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Đăng ký</button>
                        </div>
                        <center><a href="{!! url('user/login') !!}">Quay về đăng nhập</a></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
