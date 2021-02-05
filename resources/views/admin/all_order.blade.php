@extends('admin_layout')
@section('admin_content')
<div class="progressbar-heading grids-heading">
    <h2> List Order</h2>
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
  <?php
  $message = Session::get('message');
       if ($message) {
           # code...
           echo '<span class="text-alert">'.$message.'</span>';
           Session::put('message',null);
       }
?>

<div class="table-responsive">
    <table class="table table-striped b-t b-light">
    <thead>
        <tr>
        <th>Mã Đơn Hàng</th>
        <th>Package</th>
        <th>Tổng Tiền</th>
        <th>Khách Hàng</th>
        <th>Trạng Thái</th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    @foreach($show_order as $key => $order)

        <tr >

        <th>{{$order->code}}</th>
        <th>{{$order->package}}</th>
        <th>{{$order->price}}</th>
        <th>{{$order->name}}</th>
        <th><span class="text-ellipsis">

        <?php
                if ($order->status==0) {
                    # code...
                    echo 'Hiển thị';
                } else {
                    # code...
                    echo 'Ẩn';
                }

        ?>
        </span></th>
        <!-- <td><span class="text-ellipsis">7.10.2020</span></td> -->
        <th>
            <a href="{{URL::to('/edit-order/'.$order->id)}}" class="btn btn-success" ui-toggle-class="">
            Sửa</a>
        </th>
        </tr>
    @endforeach

    </tbody>
    </table>
</div>
 @endsection
