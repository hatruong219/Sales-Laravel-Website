@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Hóa Đơn
					
						      			
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
								<label for="inputLoai" class="col-md-3 control-label"><strong> DS Đơn Hàng</strong></label>
							</div>
						</div> 
						
					</div>
					
					<div class="panel-body" style="font-size: 12px;">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>										
										<th>Mã Hóa Đơn</th>	
										<th>Mã Khách Hàng</th>	
										<th>Tên Khách Hàng</th>						
										<th>Tổng tiền</th>
										<th>Ngày Mua</th>
										<th>Trạng thái</th>
										<th>Sửa</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
									@foreach($hoadon as $row)
										<tr>
											<td><a href="{!!url('admin/chitiet_hd/'.$row->ID_Hoadon)!!}">{!!$row->ID_Hoadon!!}</a></td>
											<td>{!!$row->ID_User!!}</td>
											<td>{!!$row->Name!!}</td>
											<td>{!!$row->Tongtien!!} VNĐ</td>
											<td>{!!$row->Ngaymua!!}</td>
											<form method="post" action="{!!url('admin/suahd/'.$row->ID_Hoadon)!!}" role="form">
				      						{{ csrf_field() }}
											<td>
											<select name="Trangthaidh">
												<option value="{!! $row->Trangthaidh !!}">{!! $row->Trangthaidh !!}</option>
												<option value="Chưa giao hàng!">Chưa giao hàng!</option>
												<option value="Đã giao hàng!">Đã giao hàng!</option>
											</select>
											</td>
											<td>
											    <button type="submit"><a href="{!!url('admin/suahd/'.$row->ID_Hoadon)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
											    </button>
											</td>
											</form>
											<td>
											    <button><a href="{!!url('admin/xoahd/'.$row->ID_Hoadon)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
											    </button>
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