@extends('design.trangchuadmin')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin/trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Trang chủ</li>
            </ol>
        </div><!--/.row-->
        <br><br>
        
        
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Tổng quan cửa hàng trong tháng
                    <?php $date = getdate(); echo $date['mon']-1    ; ?>        
                </div>
                <div class="panel-body">
                    <!-- dong tong quan  -->
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>SL Hóa đơn</h4>
                                    <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">{{ $slhd }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>SL Sản phẩm đã bán</h4>
                                    <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">{{ $slsp }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>Khách hàng mới</h4>
                                    <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">{{ $slkh }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>SẢN PHẨM MỚI</h4>
                                    <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">{{ $slspm }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- dong thu 2 -->
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-3">
                            <div class="panel panel-blue panel-widget ">
                                <div class="row no-padding">
                                    <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg>
                                    </div>
                                    <div class="col-sm-9 col-lg-7 widget-right">
                                        <div class="large"></div>
                                        <div class="text-muted"><a href="{!!url('admin/hdtn')!!}">DS HÓA ĐƠN</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-3">
                            <div class="panel panel-orange panel-widget">
                                <div class="row no-padding">
                                    <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"/></svg>
                                    </div>
                                    <div class="col-sm-9 col-lg-7 widget-right">
                                        <div class="large"></div>
                                        <div class="text-muted"><a href="{!!url('admin/spdbtn')!!}">SẢN PHẨM ĐÃ BÁN</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-3">
                            <div class="panel panel-teal panel-widget">
                                <div class="row no-padding">
                                    <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                                    </div>
                                    <div class="col-sm-9 col-lg-7 widget-right">
                                        <div class="large"></div>
                                        <div class="text-muted"><a href="{!!url('admin/khtn')!!}">KHÁCH HÀNG</a></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-md-6 col-lg-3">
                            <div class="panel panel-red panel-widget ">
                                <div class="row no-padding">
                                    <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg>
                                    </div>
                                    <div class="col-sm-9 col-lg-7 widget-right">
                                        <div class="large"></div>
                                        <div class="text-muted"><a href="{!!url('admin/spmtn')!!}">SẢN PHẨM MỚI</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                             
                    </div><!--/.row-->

                </div>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            
        </div><!--/.row-->
    </div>  <!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
