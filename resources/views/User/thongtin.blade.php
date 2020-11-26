@extends('design.trangchuuser')
@section('content')
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
@foreach($khachhang as $row)
        <hr>
        @if(session('sua'))
            <div class="alert alert-success">
                {{session('sua')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
            </div>         
        @endif
        <div class="container bootstrap snippet" style="background-color: white;">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Khách hàng : {!!$row->Name!!}</h2>
                    <hr>
                </div>    
            </div>
            <div class="row">
<form action="{{ url('user\suathongtin') }}" method="POST" role="form">
{{ csrf_field() }}
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        <img src="{!!url('public/hinhanh/anhdaidien/'.$row->Anhdaidien)!!}" class="avatar img-circle img-thumbnail" alt="avatar" style="width: 230px;height: 220px;">
                        <h6>Thêm một ảnh mới...</h6>
                        <input type="file" name="Anhdaidien" class="text-center center-block file-upload">
                    </div>
                    </hr><br>
                    <ul class="list-group">
                        <li class="list-group-item text-muted">Hoạt động</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Số lần mua hàng website</strong></span>{!!$slhd!!}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Bình luận trên website</strong></span>{!!$slbl!!}</li>
                    </ul> 
                </div><!--/col-3-->
                <div class="col-sm-9 cssthongtin">
                    <ul class="nav nav-tabs" style="background-color: white;border-bottom: 1px solid #ddd;">    
                        <li class="active">
                            <a data-toggle="tab" href="#thongtin">Thông tin</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#capnhat">Cập nhật</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="padding: 0px; min-height: 500px;"> 
                        <div class="tab-pane" id="capnhat">
                            <hr>
                            <div class="col-xs-3 col-md-3"></div>
                            <div class="form col-xs-6 col-md-6" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Name"><h4>Tên khách hàng</h4></label>
                                        <input type="text" class="form-control" name="Name" value="{!!$row->Name!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Phone"><h4>Số điện thoại</h4></label>
                                        <input type="text" class="form-control" name="Phone" value="{!!$row->Phone!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Gender"><h4>Giới tính</h4></label>
                                        <div class="form-control">
                                            @if(($row->Gender)=='Nam')
                                                <input style="margin-left: 100px;" type="radio" name="Gender" value="Nam" checked="">Nam
                                                <input style="margin-left: 50px;" type="radio" name="Gender" value="Nữ">Nữ
                                            @else
                                                <input style="margin-left: 100px;" type="radio" name="Gender" value="Nam">Nam
                                                <input style="margin-left: 50px;" type="radio" name="Gender" value="Nữ" checked="">Nữ
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Address"><h4>Địa chỉ</h4></label>
                                        <input type="text" class="form-control" name="Address" value="{!!$row->Address!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Pass"><h4>Mật khẩu</h4></label>
                                        <input type="text" class="form-control" name="Pass" value="{!!$row->Pass!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success center-block" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
</form>
                        <div class="tab-pane active" id="thongtin">
                            <hr>
                            <div class="col-xs-3"></div>
                            <form class="form col-xs-6" action="##" method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Name"><h4>Tên khách hàng</h4></label>
                                        <input type="text" class="form-control" name="Name" readonly="" value="{!!$row->Name!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Phone"><h4>Số điện thoại</h4></label>
                                        <input type="text" class="form-control" name="Phone" readonly="" value="{!!$row->Phone!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Gender"><h4>Giới tính</h4></label>
                                        <input type="text" class="form-control" name="Gender" readonly="" value="{!!$row->Gender!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Address"><h4>Địa chỉ</h4></label>
                                        <input type="text" class="form-control" name="Address" readonly="" value="{!!$row->Address!!}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Pass"><h4>Mật khẩu</h4></label>
                                        <input type="text" class="form-control" name="Pass" readonly="" value="{!!$row->Pass!!}">
                                    </div>
                                </div>
                            </form>

                        </div><!--/tab-pane-->

                    </div><!--/tab-content-->

                </div><!--/col-9-->
            </div><!--/row-->
            <script type="text/javascript">
                $(document).ready(function() {
                    var readURL = function(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('.avatar').attr('src', e.target.result);
                            }
                    
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    

                    $(".file-upload").on('change', function(){
                        readURL(this);
                    });
                });
            </script>
        </div>
@endforeach
@endsection