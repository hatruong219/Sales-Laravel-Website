@extends('design.trangchuuser')
@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span> 
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title="">Giỏ hàng</a>
        </h3>
        <hr style="border: 1px solid #9c5a5a">
    </div>              
    <div class="row" >              
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">
        @if(Cart::count()>0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>SL</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($giohang as $row)
                        <tr>
                            <td><img src="{!!url('public/hinhanh/sanpham/'.$row->options->img)!!}" alt="dell" width="80" height="50"></td>
                            <td>{!!$row->name !!}</td>
                            <td>{!! number_format($row->price) !!} Vnđ</td>
                            <td>                        
                                @if (($row->qty) >1)
                                    <a href="{!!url('user/giohang/suagiohang/'.$row->rowId.'/'.$row->qty.'-down')!!}"><button>-</button></a> 
                                @else
                                    <a href="{!!url('user/giohang/xoagiohang/'.$row->rowId)!!}"><button>-</button></a> 
                                @endif
                                <input type="text" class="qty text-center" value=" {!!$row->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" readonly="readonly"> 
                                <a href="{!!url('user/giohang/suagiohang/'.$row->rowId.'/'.$row->qty.'-up')!!}"><button>+</button></a>
                            </td>
                            <td>{!! number_format($row->qty * $row->price) !!} Vnd</td>
                            <td>
                                <a href="{!!url('user/giohang/xoagiohang/'.$row->rowId)!!}" onclick="return xacnhan('Xóa sản phẩm này ?')" ><span class="glyphicon glyphicon-remove" style="padding:5px; font-size:18px; color:red;"></span></a>
                            </td>
                            
                        </tr>
                        <hr>
                      @endforeach                    
                        <tr>
                            <td colspan="3"><strong>Tổng cộng :</strong> </td>
                            <td>{!!Cart::count()!!}</td>
                            <td>{!!number_format($total)!!}Vnđ</td>
                            <td>
                                <a href="{!!url('user/giohang/xoatoanbo')!!}" onclick="return xacnhan('Xóa tất cả sản phẩm trong giỏ hàng của bạn?')" ><span class="glyphicon glyphicon-remove" style="padding:5px; font-size:18px; color:red;"></span></a>
                            </td>
                        </tr>                    
                    </tbody>
                </table>                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 no-paddng">
                <a href="{!!url('user/trangchu')!!}" type="button" class="btn btn-large btn-primary pull-left">Tiếp tục mua hàng</a>
                <a href="{!!url('user/giohang/thanhtoan')!!}" type="button" class="btn btn-danger pull-right">Tiến hành thanh toán</a>
            </div>

        @else
            <div class="col-xs-12 col-sm-12 col-md-12 no-paddng">
                <h3 style="text-align: center; min-height: 300px;">Không có sản phẩm nào trong giỏ hàng</h3>
                <a href="{!!url('user/trangchu')!!}" type="button" class="btn btn-large btn-primary pull-left">Tiếp tục mua hàng</a>
            </div>
        @endif
        </div>


        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding" >
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
</div>
@endsection