@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Lịch Sử Giao Dịch
					
						      			
				</li>
			</ol>
		</div><!--/.row-->
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<form class="form" method="POST" action="{{ url('admin\loinhuan') }}">
					{{ csrf_field() }}
				&nbsp;&nbsp;Từ ngày&nbsp;&nbsp;<input style="width: 175px;height: 30px;"  type="date" name="ngaydau" >
				&nbsp;&nbsp;&nbsp;Đến ngày&nbsp;&nbsp;<input style="width: 175px;height: 30px;"  type="date" name="ngaycuoi" >
				<input style="text-align: center;" type="submit" name="thongke" value="Thống kê">
				</form>
			</div>
		</div>
		<dir class="row">
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
									<td>
									    <a href="{!!url('admin/suahd/'.$row->ID_Hoadon)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
									</td>
									<td>
									    <a href="{!!url('admin/xoahd/'.$row->ID_Hoadon)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
									</td>
								</tr>
							@endforeach								
						</tbody>
					</table>
				</div>
			</div>
		</dir>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-5">
				<span style="color: red;">Tổng Doanh Thu: </span><input style="width: 150px;height: 30px;"  type="text" value=" {{number_format($doanhthu)}} VNĐ" readonly="">
			</div>
			<div class="col-md-3"></div>
		</div>

	</div>
@endsection