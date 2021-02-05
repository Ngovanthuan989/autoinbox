@extends('admin_layout')
@section('admin_content')
    <div class="progressbar-heading grids-heading">
        <h2>Danh sách Shop</h2>
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
        <th>Name</th>
        <th>description</th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    @foreach($show_shop as $key => $shop)

        <tr>

        <th>{{$shop->name}}</th>
        <th>{{$shop->description}}</th>

        <!-- <td><span class="text-ellipsis">7.10.2020</span></td> -->
        <th>
            <a href="{{URL::to('/edit-shop/'.$shop->id)}}" class="btn btn-success" ui-toggle-class="">
            Sửa</a>
            <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-shop/'.$shop->id)}}" class="btn btn-danger" ui-toggle-class="">
           Xóa</i></a>
        </th>
        </tr>
    @endforeach

    </tbody>
</table>
</div>
 @endsection
