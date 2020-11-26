@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Khách hàng
					
						      			
				</li>
			</ol>
		</div><!--/.row-->
		<br>
		<div class="row">
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
							<div class="form-group">
								<label for="inputLoai" class="col-md-3 control-label"><strong> DS Khách hàng</strong></label>
								<div class="col-md-3">
							
								</div>
								<div class="col-md-3">
									<input type="search" name="txttk" id="inputTxttk" class="form-control" value="" placeholder="Tìm sản phẩm..." required="required" title="">
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-2">
								<a href="{!!url('admin/addkhachhang')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm Mới Khách Hàng</button></a>
							</div>
							</div>
						</div> 
						
					</div>
					
					<div class="panel-body" style="font-size: 12px;">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>										
										<th>Mã Khách Hàng</th>
										<th>Ảnh</th>	
										<th>Số Điện Thoại</th>
										<th>Mật Khẩu</th>
										<th>Tên Khách Hàng</th>	
										<th>Giới Tính</th>
										<th>Địa Chỉ</th>
										<th>Trạng Thái</th>
										<th>Sửa</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
									@foreach($khachhang as $row)
										<tr>
											<td>{!!$row->ID_User!!}</td>
											<td> <img src="{!!url('public/hinhanh/anhdaidien/'.$row->Anhdaidien)!!}" alt="iphone" width="50" height="40"></td>
											<td>{{$row->Phone}}</td>
											<td>{!!$row->Pass!!} </td>
											<td>{!!$row->Name!!}</td>
											<td>{!!$row->Gender!!}</td>
											<td>{!!$row->Address!!}</td>
											<td>{!!$row->Trangthai!!}</td>
											<td>
											    <a href="{!!url('admin/suakh/'.$row->ID_User)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
											</td>
											<td>
											    <a href="{!!url('admin/xoakh/'.$row->ID_User)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
											</td>
										</tr>
									@endforeach								
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection