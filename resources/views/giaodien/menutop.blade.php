 <!-- main menu  navbar -->
    <nav class="navbar navbar-default navbar-top" role="navigation" id="main-Nav" style="background-color: #16a085;margin-bottom: 5px;font-size: 13px;">
      <div class="container">  
        <div class="row">
          <div class="collapse navbar-collapse" id="main-mav-top">
            <ul class="nav navbar-nav">
              <li> <a href="{!!url('user/trangchu')!!}" title="" style="color: #FFFFFF;background-color: #2c3e50;"><b class="glyphicon glyphicon-home"></b> Trang chủ </a> 
              </li>
               @foreach($menutoplh as $row)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {!!$row->Namelh!!}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                      <?php
                        $con = mysqli_connect('localhost', 'root' , '', 'webbandt_laravel');
                        $sql = "SELECT * FROM thuonghieu WHERE ID_Loaihang = ".$row->ID_Loaihang;
                        $kq = mysqli_query($con,$sql);
                        while ($row1 = mysqli_fetch_array($kq)) 
                        {
                        ?>
                        <li>
                        <a href="thuonghieu/<?php echo $row1["ID_Thuonghieu"] ?>"> 
                          <?php echo $row1["Nameth"] ?>
                        </a>
                        </li>
                      <?php  
                        }
                      ?>

                    </ul>
                </li>
              @endforeach 
            </ul>
            <ul class="nav navbar-nav pull-right">
              <li>
                <form action="{{ url('/user/search') }}" method="POST">
                  {!! csrf_field() !!}
                  <input style="margin-top: 15px;background-color: white; color: black;" type="text" name="search" placeholder="Tìm sản phẩm..." >
                  <button style="background-color: #16a085;" class="btn btn-primary search-icon" type="submit" name="ok"><i class="fa fa-search"></i></button>  
                </form>
              </li>

              @if (Session::has('admin'))
                <li><a href="{{ url('/admin/trangchu') }}">Trang quản trị</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Session::get('admin') }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/admin/thongtin') }}">Thông tin cá nhân</a></li>
                        <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>


              @elseif (Session::has('khachhang'))
                <li><a href="{{ url('user/giohang') }}">
                  <span class="glyphicon glyphicon-shopping-cart"></span> Giỏ Hàng</a>
                </li> 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Session::get('khachhang') }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('user/thongtin') }}">Thông tin cá nhân</a></li>
                        <li><a href="{{ url('user/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
              @else
                <li><a href="{{ url('user/giohang') }}">
                  <span class="glyphicon glyphicon-shopping-cart"></span> Giỏ Hàng</a>
                </li> 
                <li><a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a></li>
              @endif              

            </ul>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div> <!-- /row -->
      </div><!-- /container -->
    </nav>    <!-- /main nav -->

