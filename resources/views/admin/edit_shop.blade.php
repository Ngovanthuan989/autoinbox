@extends('admin_layout')
@section('admin_content')
<div class="progressbar-heading grids-heading">
    <h2>Update Shop</h2>
</div>
<?php
$message = Session::get('message');
     if ($message) {
         # code...
         echo '<span class="text-alert">'.$message.'</span>';
         Session::put('message',null);
     }
?>
<div class="panel panel-widget forms-panel">
    <div class="forms">
         <h3 class="title1"></h3>
        <div class="form-three widget-shadow">
            <form class="form-horizontal" action="{{URL::to('/update-shop/'.$edit_shop->id)}}" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$edit_shop->name}}" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$edit_shop->description}}" class="form-control" name="description" id="description" placeholder="Description">
                    </div>
                </div>

                <button type="submit" name="add_contact" class="btn btn-info">Update Shop</button>

            </form>
        </div>
    </div>
</div>


@endsection
