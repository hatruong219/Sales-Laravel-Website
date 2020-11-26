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
        <hr>
        <div class="container bootstrap snippet" style="background-color: white;">
            <div class="row">
                <div class="col-sm-10">
                    <h1>User name</h1>
                </div>    
            </div>
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <h6>Upload a different photo...</h6>
                        <input type="file" class="text-center center-block file-upload">
                    </div>
                    </hr><br>
                    <ul class="list-group">
                        <li class="list-group-item text-muted">Hoạt động</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Số sản phẩm đã mua</strong></span> 125</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Bình luận trên website</strong></span> 125</li>
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
                        <div class="tab-pane active" id="thongtin">
                            <hr>
                            <div class="col-xs-3"></div>
                            <form class="form col-xs-6" action="##" method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Name"><h4>Tên khách hàng</h4></label>
                                        <input type="text" class="form-control" name="Name" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Phone"><h4>Số điện thoại</h4></label>
                                        <input type="text" class="form-control" name="Phone" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Gender"><h4>Giới tính</h4></label>
                                        <input type="text" class="form-control" name="Gender" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Address"><h4>Địa chỉ</h4></label>
                                        <input type="text" class="form-control" name="Address" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Pass"><h4>Mật khẩu</h4></label>
                                        <input type="text" class="form-control" name="Pass" readonly="">
                                    </div>
                                </div>
                            </form>

                        </div><!--/tab-pane-->

                        <div class="tab-pane" id="capnhat">
                            <hr>
                            <div class="col-xs-3"></div>
                            <form class="form col-xs-6" action="suathongtin" method="post" id="registrationForm">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Name"><h4>Tên khách hàng</h4></label>
                                        <input type="text" class="form-control" name="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Phone"><h4>Số điện thoại</h4></label>
                                        <input type="text" class="form-control" name="Phone" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Gender"><h4>Giới tính</h4></label>
                                        <div class="form-control">
                                            <input style="margin-left: 100px;" type="radio" name="Gender" value="Nam">Nam
                                            <input style="margin-left: 50px;" type="radio" name="Gender" value="Nữ">Nữ
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Address"><h4>Địa chỉ</h4></label>
                                        <input type="text" class="form-control" name="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="Pass"><h4>Mật khẩu</h4></label>
                                        <input type="text" class="form-control" name="Pass">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success center-block" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

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
    @endsection