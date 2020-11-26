@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin/trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Loại Sản Phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Thêm Loại Sản Phẩm Mới:</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
						<form action="{{ url('admin\themlh') }}" method="POST" role="form">
				      		{{ csrf_field() }}
				      		<div class="form-group">
				      			<label for="input-id">Tên Loại Sản Phẩm</label>
				      			<input type="text" name="Namelh" class="form-control">
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