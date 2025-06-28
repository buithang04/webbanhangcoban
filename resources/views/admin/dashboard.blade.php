@extends('admin_layout')
@section('admin_content')

<h2 class="text-center text-primary mb-4">Chào mừng bạn đến với trang quản trị</h2>

	<section class="wrapper">

			
			<div class="col-md-3">
				<div class="panel panel-success shadow" style="border-radius: 10px;">
					<div class="panel-body text-center">
						<i class="fa fa-check-circle fa-3x text-success mb-2"></i>
						<h4 class="mt-2">Đơn hàng đã xác nhận</h4>
						<h3 class="text-bold text-success">{{ $order_count1 }}</h3>
					</div>
				</div>
			</div>

			
			<div class="col-md-3">
				<div class="panel panel-warning shadow" style="border-radius: 10px;">
					<div class="panel-body text-center">
						<i class="fa fa-clock-o fa-3x text-warning mb-2"></i>
						<h4 class="mt-2">Chưa xác nhận</h4>
						<h3 class="text-bold text-warning">{{ $order_count2 }}</h3>
					</div>
				</div>
			</div>

		
			<div class="col-md-3">
				<div class="panel panel-info shadow" style="border-radius: 10px;">
					<div class="panel-body text-center">
						<i class="fa fa-line-chart fa-3x text-info mb-2"></i>
						<h4 class="mt-2">Doanh thu</h4>
						<h3 class="text-bold text-info">{{ number_format($total_revenue) }} <small>VND</small></h3>
					</div>
				</div>
			</div>

    
			<div class="col-md-3">
				<div class="panel panel-danger shadow" style="border-radius: 10px;">
					<div class="panel-body text-center">
						<i class="fa fa-users fa-3x text-danger mb-2"></i>
						<h4 class="mt-2">Người dùng</h4>
						<h3 class="text-bold text-danger">{{ $user_count }}</h3>
					</div>
				</div>
			</div>
	</section>

@endsection
