@extends('design.trangchuuser')
@section('content')	
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="container row" >
	<div class="col-md-8 col-xs-12">
		@foreach($data as $row)
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img style="width: 100%;height: 250px;" src="{!!url('public/hinhanh/sanpham/'.$row->Image)!!}" /></div>
						</div>
					</div>
					<div class="details col-md-6" style="border-left: 1px solid gray;">
						<h3 class="product-title">{!!$row->Namesp!!}</h3>
						<p class="product-description" style="min-height: 130px;">{!!$row->Mota!!}</p>
						<h4 class="price">Giá sản phẩm: <span>{!!number_format($row->Gia)!!}  Vnđ</span></h4>
						<div class="action">
							<button class="add-to-cart btn btn-succses" type="button">Thêm vào giỏ hàng</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<hr>
		<p><b>Bình luận về sản phẩm</b></p>
		<!-- Comment -->
		<div class="panel panel-white post panel-shadow">
            <div class="post-footer">
                <form class="input-group" action="{{ url('/user/binhluan')}}/{!!$idsp!!}" method="get"> 
                    <input name="bl" id="binhluan" class="form-control" placeholder="Add a comment" type="text">
                    <span class="input-group-addon">
                        <button><a href="#"><i class="fa fa-edit"></i></a></button>  
                    </span>
                </form>
                @foreach($binhluan as $row)
                <ul class="comments-list">
                    <li class="comment" style="list-style-type: none;">
                        <a class="pull-left" href="#">
                            <img src="{!!url('public/hinhanh/anhdaidien/'.$row->Anhdaidien)!!}" class="avatar img-circle img-thumbnail" alt="avatar" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user">{!!$row->Name!!}</h4>
                                <h5 class="time">{!!$row->Ngaybl!!}</h5>
                            </div>
                            <p>{!!$row->Noidung!!}</p>
                        </div>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
	</div>
	<div class="col-md-4 col-xs-12">
		<div class="panel-heading">
            <h3 class="panel-title text-center">Sự kiện HOT</h3>
        </div>
        <div class="panel-body no-padding">
            <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc2.png')!!}" alt="" width="100%" height="100%"> </a> <br><hr>
            <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc3.png')!!}" alt="" width="100%" height="100%"> </a><br><hr>
            <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc4.png')!!}" alt="" width="100%" height="100%"> </a>
        </div>
	</div>
</div>

@endsection