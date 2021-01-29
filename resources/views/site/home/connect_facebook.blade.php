@extends('site.master.master')
@section('title', 'AutoInbox')
@section('content')
<div class="wrapper">
<section class="container mt-5" id="send-page">
    <div class="row">
        <div id="header" class="container m-auto text-center" style="margin: 30px auto!important;">
            <img src="/public/images/favicon.png" id="src-logo">
            <p class="text-secondary" style="margin-top: 10px;margin-bottom: 0;">
                Công cụ gửi tin nhắn hàng loạt không vi phạm chính sách cho Fanpage
            </p>
        </div>
        <div class="col-md-5 m-auto">
        <p>   <b> Bước 1: </b>Tải extension autoinbox <a href="">tại đây</a> </p>
        <p>    <b>Bước 2: </b>Cài đặt extension theo hướng dẫn  <a href="">tại đây</a> </p>
        <p>    <b>Bước 3: </b>Ấn kết nối ngay để kết nối để kết nối  tài khoản facebook của bạn với hệ thống </p>
        <p class="text-center">
            <button id="connect-facebook" class="btn btn-primary">
                Kết nối ngay
                <span class="spinner-grow spinner-grow-sm d-none"></span>
            </button>
        </p>
        </div>
    </div>
</section>
</div>
@include('site.home.input-extension');
<script>
    $('#connect-facebook').click(function (){
        if($('input#check_extension').val() != 1){
            alert('Bạn chưa cài đặt extension. Vui lòng cài đặt theo hướng dẫn');
        }
    });
</script>
@endsection
