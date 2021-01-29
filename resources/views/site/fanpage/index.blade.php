@extends('site.master.master')
@section('title', 'AutoInbox')
@section('content')
<section class="container mt-5">
    <div class="row">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif
        @if(App\Models\Fanpage::getCountFanpage() <= 0)
        <div id="header" class="container m-auto text-center" style="margin: 30px auto!important;">
            <img src="/public/images/favicon.png" id="src-logo">
            <p class="text-secondary" style="margin-top: 10px;margin-bottom: 0;">
                Kết nối với fanpage của bạn ngay;
            </p>
        </div>
        <div class="text-center col-md-12">
            <a href="{{route('get_fanpage')}}" class="btn btn-primary">
                Kết nối Fanpage của bạn
                <span class="spinner-grow spinner-grow-sm d-none"></span>
            </a>
        </div>
        @else
            @foreach($fanpages as $key => $fanpage)
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="https://graph.facebook.com/{{$fanpage->fanpage_id}}/picture?type=large" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$fanpage->fanpage_name}}</h3>

                        <p class="text-muted text-center">
                            <a href="https://fb.com/{{$fanpage->fanpage_id}}" target="_blank">{{$fanpage->fanpage_id}}
                            </a>
                        </p>
                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Kích hoạt</b> <a class="float-right">
                                <button class="btn btn-primary btn-sm">Kích hoạt</button>
                            </a>
                        </li>
                        </ul>
                        @if($fanpage->status == 1)
                            <a href="{{route('fanpage.show', ['fanpage' => $fanpage->fanpage_id])}}" class="btn btn-primary btn-block"><b>Gửi tin nhắn</b></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            @endforeach
        @endif
    </div>
</section>
@include('site.home.input-extension')
@endsection
