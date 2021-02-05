@extends('admin_layout')
@section('admin_content')
<div class="progressbar-heading grids-heading">
    <h2> Update Contact</h2>
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
            <form class="form-horizontal" action="{{URL::to('/update-contact/'.$edit_contacts->id)}}" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Contact Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$edit_contacts->name}}" class="form-control" name="name" id="name" placeholder="Contact Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Contact Phone</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$edit_contacts->phone}}" class="form-control" name="phone" id="phone" placeholder="Contact Phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Contact Email</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$edit_contacts->email}}" class="form-control" name="email" id="email" placeholder="Contact Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="smallinput" class="col-sm-2 control-label label-input-sm">Message</label>
                    <div class="col-sm-8">
                    <textarea style="resize: none;" rows="8" class="form-control" name="message" id="message" placeholder="Contact Message">{{$edit_contacts->message}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Contact Status</label>
                    <div class="col-sm-8"><select name="status" id="status" class="form-control">
                        <option value="0">Hiển Thị</option>
                        <option value="1">Ẩn</option>
                    </select></div>
                </div>

                <button type="submit" name="add_contact" class="btn btn-info">Update Contact</button>

            </form>
        </div>
    </div>
</div>


@endsection
