
<!DOCTYPE html>
<head>
<title>Trang quan ly admin wed</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="public/backend/css/bootstrap.min.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="public/backend/css/style-responsive.css">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css"/>
<link rel="stylesheet" href="public/backend/css/font-awesome.css">

<script src="public/backend/js/jquery2.0.3.min.js"></script>

</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2 class="tiepbx" style="">Đăng nhập</h2>
	<?php
    $message = Session::get('message');
    if ($message) {
        echo '<span style="
            color: red;
            font-size: 16px;
            width: 100%;
            text-align: center;
            font-weight: bold;
        ">'.$message.'</span>';
        Session::put('message', null);
    }
?>

		<form action="{{ URL::to('/admin-dashboard')}}" method="post">
			{{@csrf_field()}}
			<input type="text" class="ggg" name="admin_email" placeholder="Điền email" required="">
			<input type="password" class="ggg" name="admin_password" placeholder="Điền password" required="">
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
        <a href="{{ URL::to('/login-google')}}">Login bằng Google</a>

</div>

</div>
<script src="public/backend/js/bootstrap.js"></script>
<script src="public/backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/backend/js/jquery.nicescroll.js"></script>
<script src="public/backend/js/jquery.slimscroll.js"></script>
<script src="public/backend/js/scripts.js"></script>
<script src="public/backend/js/jquery.scrollTo.js"></script>




</body>
</html>
