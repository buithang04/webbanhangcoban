@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê tài khoản
    </div>
    
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if ($message) {
        echo '<span style="
            color: red;
            font-size: 16px;
            width: 100%;
            text-align: center;
            font-weight: bold;
        ">' . $message . '</span>';
        Session::put('message', null);
      }
      ?>

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên đăng nhập</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th style="width: 350px;">Địa chỉ</th>
            
           
          </tr>
        </thead>
        <tbody>
          @foreach($all_customer as $key => $pro)
          
          <tr>
            
            <td>{{$pro->customer_email}}</td>
            <td>{{$pro->customer_name}}</td>
            <td>{{$pro->customer_phone}}</td>
            <td style="width: 350px;">{{$pro->customer_address}}</td>
            

              </span></td>
            <td>
              <a href="{{URL::to('/edit-customer/'.$pro->customer_id)}}" class="active" ui-toggle-class=""
              style="font-size: 20px;">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>

                <a onclick="return confirm('Bạn có chắc muốn tài khoản?')"  href="{{URL::to('/delete-customer/'.$pro->customer_id)}}" class="active" ui-toggle-class=""
                style="font-size: 20px;">
                <i class="fa fa-times text-danger text"></i>
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
  <div class="row">
    <div class="col-sm-5 text-left">
      <small class="text-muted inline m-t-sm m-b-sm">
        Hiển thị {{ $all_customer->firstItem() }} - {{ $all_customer->lastItem() }} / {{ $all_customer->total() }} tài khoản
      </small>
    </div>
    <div class="col-sm-7 text-right text-center-xs">
      <div class="pagination pagination-sm m-t-none m-b-none" style="display:inline-block;">
        {{ $all_customer->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</footer>

  </div>
</div>

@endsection