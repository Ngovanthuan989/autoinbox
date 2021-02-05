@extends('admin_layout')
@section('admin_content')
<div class="progressbar-heading grids-heading">
						<h2> List Contacts</h2>
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
        <th>Contact Name</th>
        <th>Contact Phone</th>
        <th>Contact Email</th>
        <th>Message</th>
        <th>Contact Status</th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    @foreach($show_contact as $key => $contact)

        <tr >

        <th>{{$contact->name}}</th>
        <th>{{$contact->phone}}</th>
        <th>{{$contact->email}}</th>
        <th>{{$contact->message}}</th>
        <th><span class="text-ellipsis">

        <?php
                if ($contact->status==0) {
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
            <a href="{{URL::to('/edit-contact/'.$contact->id)}}" class="btn btn-success" ui-toggle-class="">
            Sửa</a>
            <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-contact/'.$contact->id)}}" class="btn btn-danger" ui-toggle-class="">
           Xóa</i></a>
        </th>
        </tr>
    @endforeach

    </tbody>
    </table>
</div>
 @endsection
