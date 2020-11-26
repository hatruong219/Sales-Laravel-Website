@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sản Phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Sửa Thông Tin Sản Phẩm:</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
						@foreach($sanpham as $row)
						<form action="{!!url('admin/suasp/'.$row->ID_Sanpham)!!}" method="POST" role="form">
				      		{{ csrf_field() }}
							<div class="form-group">
				      			<label for="input-id">Thương Hiệu</label>
				      			<select name="ID_Thuonghieu" class="form-control">
				      				<option value="{!!$row->ID_Thuonghieu!!}">{!!$row->Nameth!!}</option>
				      	@endforeach
					      			@foreach($data as $row)
					      				<option value="{!!$row->ID_Thuonghieu!!}">{!!$row->Nameth!!} </option>
					      			@endforeach
					      		</select>
				      		</div>
				      		@foreach($sanpham as $row)
				      		<div class="form-group">
				      			<label for="input-id">Tên Sản Phẩm</label>
				      			<input type="text" name="Namesp" class="form-control" value="{!!$row->Namesp!!}">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id"> Ảnh Cũ </label>
				      			<div>
				      				<img src="{!!url('public/hinhanh/sanpham/'.$row->Image)!!}" width="80" height="60">
				      			</div>
				      		</div>
				      		<div class="form-group row">
				      			<div class="col-md-4">
				      				<label for="input-id">Ảnh Mới</label>
				      				<input type="file" name="Image" class="form-control">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Giá</label>
				      				<input type="number" name="Gia" class="form-control" value="{!!$row->Gia!!}" required="">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Số Lượng</label>
				      				<input type="number" name="Soluong" value="{!!$row->Soluong!!}" class="form-control">
				      			</div>
				      		</div>
				      		<div class="form-group">
				      			<div class="row">					      			
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Mô tả về sản phẩm</label>
					      				<textarea name="Mota" id="inputtxtReview" class="form-control" rows="4"  > {!!$row->Mota!!}</textarea>
					      				<script type="text/javascript">
											var editor = CKEDITOR.replace('Moa',{
												language:'vi',
												filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
												filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
												filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											});
										</script>
					      			</div>
					      		</div>				      			
				      		</div>	
				      		@endforeach	
				      		<input type="submit" name="sua" class="btn btn-primary" value="Sửa" class="button" />
				      	</form>		      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection