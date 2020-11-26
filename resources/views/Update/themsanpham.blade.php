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
				<h1 class="page-header"><small>Thêm Sản Phẩm Mới:</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
						<form action="{{ url('admin\themsp') }}" method="POST" role="form">
				      		{{ csrf_field() }}
				

							<div class="form-group">
				      			<label for="input-id">Thương Hiệu</label>
				      			<select name="ID_Thuonghieu" class="form-control">
					      			@foreach($data as $row)
					      				<option value="{!!$row->ID_Thuonghieu!!}">{!!$row->Nameth!!} </option>
					      			@endforeach
					      		</select>
				      		</div>

				      		<div class="form-group">
				      			<label for="input-id">Tên Sản Phẩm</label>
				      			<input type="text" name="Namesp" class="form-control">
				      		</div>

				      		<div class="form-group row">
				      			<div class="col-md-4">
				      				<label for="input-id">Hình Ảnh</label>
				      				 <input type="file" name="Image" accept="image/png" class="form-control" required="">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Giá</label>
				      				<input type="number" name="Gia" class="form-control" required="">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Số Lượng</label>
				      				<input type="number" name="Soluong" class="form-control">
				      			</div>
				      		</div>
				      		<div class="form-group">
				      			<div class="row">					      			
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Bài đánh giá chi tiết</label>
					      				<textarea name="Mota" id="inputtxtReview" class="form-control" rows="4" ></textarea>
					      				<script type="text/javascript">
											var editor = CKEDITOR.replace('Mota',{
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

				      		<input type="submit" name="them" class="btn btn-primary" value="Thêm" class="button" />
				      	</form>			      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection