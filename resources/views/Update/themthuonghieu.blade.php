@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin/trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Thương hiệu</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Thêm Thương Hiệu Mới:</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
						<form action="{{ url('admin\themth') }}" method="POST" role="form">
				      		{{ csrf_field() }}
				      		<div class="form-group">
				      			<label for="input-id">Tên Thương Hiệu</label>
				      			<input type="text" name="Nameth" class="form-control">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Địa Chỉ</label>
				      			<input type="text" name="Address" class="form-control">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Ghi Chú</label>
				      			<input type="text" name="Note" class="form-control">
				      		</div>

				      		<div class="form-group">
				      			<label for="input-id">Loại Hàng</label>
				      			<select name="ID_Loaihang" class="form-control">
					      			@foreach($data as $row)
					      				<option value="{!!$row->ID_Loaihang!!}">{!!$row->Namelh!!} </option>
					      			@endforeach
					      		</select>
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