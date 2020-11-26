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
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="form-group">
								<label for="inputLoai" class="col-md-3 control-label"><strong>Lịch sử giao dịch</strong></label>
								<div class="col-md-3">
							
								</div>
								<div class="col-md-3">
									<input type="search" name="txttk" id="inputTxttk" class="form-control" value="" placeholder="Tìm sản phẩm..." required="required" title="">
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-2">
								<a href="{!!url('admin/addhoadon')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm Mới</button></a>
							</div>
							</div>
						</div> 
						
					</div>
					
					<div class="panel-body" style="font-size: 12px;">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>										
										<th>Mã Chi Tiết HD</th>	
										<th>Tên Sản Phẩm</th>	
										<th>Hình Ảnh</th>				
										<th>Số Lượng</th>
										<th>Giá</th>
										<th>Mã Hóa Đơn</th>
										<th>Sửa</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $row)
										<tr>
											<td>{!!$row->ID_Chitiethd!!}</td>
											<td>{!!$row->Namesp!!}</td>
											<td> 
												<img src="{!!url('public/hinhanh/sanpham/'.$row->Image)!!}" alt="iphone" width="50" height="40">
											</td>
											<td>{!!$row->Soluongmua!!}</td>
											<td>{!!$row->Gia!!} VNĐ</td>
											<td>{!!$row->ID_Hoadon!!}</td>
											<td>
											    <a href="{!!url('admin/suacthd/'.$row->ID_Chitiethd)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
											</td>
											<td>
											    <a href="{!!url('admin/xoacthd/'.$row->ID_Chitiethd)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
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