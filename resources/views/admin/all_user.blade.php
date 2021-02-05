@extends('admin_layout')
@section('admin_content')
    <div class="progressbar-heading grids-heading">
        <h2>Danh sách User</h2>
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
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    @foreach($show_user as $key => $user)

        <tr >

        <th>{{$user->name}}</th>
        <th>{{$user->phone}}</th>
        <th>{{$user->email}}</th>
        <th><span class="text-ellipsis">

        <?php
                if ($user->status==0) {
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
            <a href="{{URL::to('/edit-user/'.$user->id)}}" class="btn btn-success" ui-toggle-class="">
            Sửa</a>
            <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-user/'.$user->id)}}" class="btn btn-danger" ui-toggle-class="">
           Xóa</i></a>
        </th>
        </tr>
    @endforeach

    </tbody>
</table>
</div>
 @endsection
