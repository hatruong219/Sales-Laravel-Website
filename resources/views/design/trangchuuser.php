@include('giaodien.header')
@include('giaodien.menutop')
<div class="container">     
    <div class="row">  
	    <div class="col-md-12">
	    	@include('giaodien.slide')
	    </div>
	    <div class="col-md-12">
	    	@yield('content')
	    </div>
	    <div class="col-md-12">
    		@include('giaodien.gioithieu')
    	</div>
    </div>       <!-- /row -->
</div> 
@include('giaodien.nguoithietke')