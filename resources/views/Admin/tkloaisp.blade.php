@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
    <div class="main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin/trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Loại sản phẩm</li>
            </ol>
        </div><!--/.row-->
        <br>


        <div class="row">
            <div class="col-lg-12">
                @if(session('them'))
                    <div class="alert alert-success">
                        {{session('them')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                    </div>         
                @endif
                @if(session('sua'))
                    <div class="alert alert-info">
                        {{session('sua')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                    </div>         
                @endif
                @if(session('xoa'))
                    <div class="alert alert-danger">
                        {{session('xoa')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                    </div>         
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="inputLoai" class="col-sm-12 control-label"><strong>Danh Sách Loại Sản Phẩm </strong></label>
                                </div>   
                            </div>
                            <div class="col-md-3">
                               <a href="{!!url('admin/themlh')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm Mới</button></a>
                            </div>
                        </div>     
                    </div>
                    <div class="panel-body" style="font-size: 12px;">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>                                        
                                        <th>Mã loại hàng</th>                                     
                                        <th>Tên loại hàng</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loaihang as $row)
                                        <tr>
                                            <td>{!!$row->ID_Loaihang!!}</td>
                                     
                                            <td>{!!$row->Namelh!!}</td>
                                            <td>
                                                <a href="{!!url('admin/sualh/'.$row->ID_Loaihang)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
                                            </td>
                                            <td>
                                                <a href="{!!url('admin/xoalh/'.$row->ID_Loaihang)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
                                            </td>
                                        </tr>
                                    @endforeach                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->      
    </div>  <!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection