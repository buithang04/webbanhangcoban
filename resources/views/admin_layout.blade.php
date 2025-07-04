<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Dash board</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href=" {{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('public/backend/css/style-responsive.css') }} " rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }} " type="text/css"/>
<link href="{{ asset('public/backend/css/font-awesome.css') }} " rel="stylesheet"> 
<link rel="stylesheet" href="{{ asset('public/backend/css/morris.css') }} " type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{ asset('public/backend/css/monthly.css') }} ">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
<script src="{{ asset('public/backend/js/raphael-min.js') }}"></script>
<script src="{{ asset('public/backend/js/morris.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{ url('/dashboard') }}" class="logo">
        admin
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{ asset('public/backend/img/2.png') }}">
                <span class="username"></span>
				<?php

				$name= Session::get('admin_name');
				if($name){
					echo $name;
				}
				?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Tài khoản</a></li>
                <li><a href="{{ URL::to('/logout') }}"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
				<a class="active" href="{{ url('/dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Danh sách đơn hàng</a></li>
					
                    </ul>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Tài khoản khách hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-customer')}}">Danh sách tài khoản</a></li>
					
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm </a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Danh sách danh mục sản phẩm</a></li>
                    </ul>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm </a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Danh sách thương hiệu sản phẩm</a></li>
                    </ul>
                </li>

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm </a></li>
						<li><a href="{{URL::to('/all-product')}}">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li>
                           </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
		
<!--main content end-->
</section>
<script src=" {{ asset('public/backend/js/bootstrap.js') }}"></script>
<script src=" {{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src=" {{ asset('public/backend/js/scripts.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.slimscroll.js') }} "></script>
<script src=" {{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src=" public/backend/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{ asset('public/backend/js/jquery.scrollTo.js') }} "></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src=" {{ asset('public/backend/js/monthly.js') }}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>

<script>
    $(document).ready(function(){

        // thêm gallery
        load_gallery();

        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{ url('/select-gallery') }}",
                method: "POST",
                data: { pro_id: pro_id, _token: _token },
                success: function(data){
                    $('#gallery_load').html(data); 
                }
            });
        }

        $('#file').change(function () {
    var error = '';
    var files = $('#file')[0].files; 
    if (files.length > 5) {
        error += '<p>Bạn chỉ được chọn tối đa 5 ảnh.</p>';
    } else if (files.length === 0) {
        error += '<p>Bạn chưa chọn ảnh nào.</p>';
    } else {
        for (var i = 0; i < files.length; i++) {
            if (files[i].size > 2000000) {
                error += '<p>Ảnh "' + files[i].name + '" lớn hơn 2MB.</p>';
            }
        }
    }
    if (error === '') {
        $('#error_gallery').html('');
    } else {
        $('#file').val('');
        $('#error_gallery').html('<span class="text-danger">' + error + '</span>');
        return false;
    }
});

//chỉnh sửa tên gallery
$(document).on('blur', '.edit_gal_name', function () {
    var gal_id = $(this).data('gal_id');
    var gal_text = $(this).text();
    var _token = $('input[name="_token"]').val();

    $.ajax({
        url: "{{ url('/update-gallery-name') }}",
        method: "POST",
        data: { gal_id: gal_id, gal_text: gal_text, _token: _token },
        success: function (data) {
            load_gallery(); 
            $('#error_gallery').html('<span class="text-success">Cập nhật tên hình ảnh thành công</span>');
        }
    });
});
//xóa gallery
$(document).on('click', '.delete-gallery', function () {
    var gal_id = $(this).data('gal_id');
    var _token = $('input[name="_token"]').val();
    if(confirm('Bạn có muốn xóa ảnh này hay không?')){
            $.ajax({
                url: "{{ url('/delete-gallery') }}",
                method: "POST",
                data: { gal_id: gal_id, _token: _token },
                success: function (data) {
                    load_gallery(); 
                    $('#error_gallery').html('<span class="text-success">Xóa hình ảnh thành công</span>');
                }
            });
    }
});
//chỉnh sửa từng gallery
$(document).on('change', '.file_image', function () {
    var gal_id = $(this).data('gal_id');
    var input = document.getElementById('file-' + gal_id);
    var image = input.files[0];
    var form_data = new FormData();
    form_data.append("file", image);
    form_data.append("gal_id", gal_id);

    if (confirm('Bạn có chắc muốn cập nhật ảnh này không?')) {
        $.ajax({
            url: "{{ url('/update-gallery') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    load_gallery();
                    $('#error_gallery').html('<span class="text-success">' + data.message + '</span>');
                } else {
                    $('#error_gallery').html('<span class="text-danger">' + data.message + '</span>');
                }
            },
            error: function (xhr) {
                $('#error_gallery').html('<span class="text-danger">Lỗi cập nhật ảnh</span>');
                console.log(xhr.responseText);
            }
        });
    }
});




    });
</script>

	<!-- //calendar -->
</body>
</html>
