@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
    <div class="main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Thương hiệu</li>
            </ol>
        </div><!--/.row-->
        <br>


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-5">
		                        <div class="form-group">
		                            <label for="inputLoai" class="col-sm-12 control-label"><strong>Danh Sách Thương Hiệu</strong></label>
		                        </div>
                            </div>
                             <div class="col-md-3">
								<select name="sltCate" id="inputLoai" class="form-control">
									<option value="0">-LOẠI HÀNG --</option>
					      			@foreach($data as $row)
					      				<option value="{!!$row->ID_Loaihang!!}">{!!$row->Namelh!!} </option>
					      			@endforeach
					      		</select>
								<script>
								    document.getElementById("inputLoai").onchange = function() {
								        if (this.selectedIndex!==0) {
								            window.location.href = this.value;
								        }        
								    };
								</script>
							</div>
							<data class="col-md-1"></data>
                            <div class="col-md-3">
                               <a href="{!!url('admin/themth')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm Mới</button></a>
                            </div>
                        </div>     
                    </div>

                    <div class="panel-body" style="font-size: 12px;">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>                                        
                                        <th>Mã Thương Hiệu</th>                          
                                        <th>Tên Thương Hiệu</th>
                                        <th>Địa Chỉ</th>
                                        <th>Ghi Chú</th>
                                        <th>Loại Sản Phẩm</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($thuonghieu as $row)
                                        <tr>
                                            <td>{!!$row->ID_Thuonghieu!!}</td>
                                            <td>{!!$row->Nameth!!}</td>
                                            <td>{!!$row->Address!!}</td>
                                            <td>{!!$row->Note!!}</td>
                                            <td>{!!$row->Namelh!!}</td>
                                            <td>
                                                <a href="{!!url('admin/suath/'.$row->ID_Thuonghieu)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
                                            </td>
                                            <td>
                                                <a href="{!!url('admin/xoath/'.$row->ID_Thuonghieu)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
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