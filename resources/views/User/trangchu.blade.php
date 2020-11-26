@extends('design.trangchuuser')

@section('content')
@if(isset($soluongsp))
    <div class="alert alert-success">
        Có {{($soluongsp)}} sản phẩm
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
    </div>         
@endif
<div class="container" style="text-align:center;">
    <div class="row">
    @foreach($data as $row)
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 no-padding" >
            <div class="product-grid6" style="height:400px; margin-bottom:30px;" >
                <div class="product-image6">
                    <a href="{!!url('user/chitietsp/'.$row->ID_Sanpham)!!}">
                        <img class="pic-1" style="width:200px; height:200px;" src="{!!url('public/hinhanh/sanpham/'.$row->Image)!!}">
                    </a>
                </div>
                <div class="product-content">
                    <h3 class="title" style=""><a href="#" style="">{!!$row->Namesp!!}</a></h3>
                    <br><br>
                    <span class="price" style="text-algin:center;">{!!number_format($row->Gia)!!} VNĐ</span>
                </div>
                <ul class="social">
                    <li><a href="{!!url('user/chitietsp/'.$row->ID_Sanpham)!!}" data-tip="Chi tiết"><i class="fa fa-search"></i></a></li>
                    <li><a href="{!!url('user/giohang/themvaogio/'.$row->ID_Sanpham)!!}" data-tip="Thêm giỏ hàng"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <div style="display: inline-block;">
        {{ $data->links() }}
    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection