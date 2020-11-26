@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sản phẩm
					
						      			
				</li>
			</ol>
		</div><!--/.row-->
		<br>
		<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="form-group">
								<label for="inputLoai" class="col-md-3 control-label"><strong> DS SẢN PHẨM</strong></label>
								<div class="col-md-3">
									<select name="sltCate" id="inputLoai" class="form-control">
										<option value="0">-THƯƠNG HIỆU --</option>
						      			@foreach($data as $row)
						      				<option value="{!!$row->ID_Thuonghieu!!}">{!!$row->Nameth!!} </option>
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
								<div class="col-md-3">
									<input type="search" name="txttk" id="inputTxttk" class="form-control" value="" placeholder="Tìm sản phẩm..." required="required" title="">
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-2">
								<a href="{!!url('admin/themsp')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm Mới Sản Phẩm</button></a>
							</div>
							</div>
						</div> 
						
					</div>
					
					<div class="panel-body" style="font-size: 12px;">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead> 
									<tr>										
										<th>ID</th>										
										<th>Hình ảnh</th>
										<th>Tên sản phẩm</th>
										<th>Thương hiệu</th>
										<th>Giá bán</th>
										<th>Số lượng</th>
										<th>Mô tả</th>
										<th>Sửa</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
									@foreach($sanpham as $row)
										<tr>
											<td>{!!$row->ID_Sanpham!!}</td>
											<td> <img src="{!!url('public/hinhanh/sanpham/'.$row->Image)!!}" alt="iphone" width="50" height="40"></td>
											<td>{!!$row->Namesp!!}</td>
											<td>{!!$row->Nameth!!}</td>
											<td>{!!$row->Gia!!} VNĐ</td>
											<td>{!!$row->Soluong!!}</td>
											<td style="overflow: hidden;text-overflow: ellipsis;line-height: 50px;-webkit-line-clamp: 3;height: 150px;display: -webkit-box;-webkit-box-orient: vertical;">{!!$row->Mota!!}</td>
											<td>
											    <a href="{!!url('admin/suasp/'.$row->ID_Sanpham)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
											</td>
											<td>
											    <a href="{!!url('admin/xoasp/'.$row->ID_Sanpham)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
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