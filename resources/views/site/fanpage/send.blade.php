@extends('site.master.master')
@section('title', 'AutoInbox')
@section('content')
<div class="wrapper">
<section class="container" id="send-page">
    <form id="form_send">
        @csrf
        <div class="row">
            <div id="header" class="container m-auto text-center" style="margin: 30px auto!important;">
                <h3>
                    <img src="https://graph.facebook.com/{{$fanpage->fanpage_id}}/picture?type=large" alt="" width="30px" height="30px" > {{ $fanpage->fanpage_name }}
                </h3>
                <img src="/public/images/favicon.png" id="src-logo">
                <p class="text-secondary" style="margin-top: 10px;margin-bottom: 0;">
                    Công cụ gửi tin nhắn hàng loạt không vi phạm chính sách cho Fanpage
                </p>
            </div>
            <div class="col-md-5">
                <div class="mb-2 d-none" id="notification_exten">
                    <span class="text-danger">Lỗi kết nối vui lòng thử lại!</span>
                    <button class="btn btn-danger" id="refresh_token_exten">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-clockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                        </svg>
                        Refresh
                    </button>
                </div>
                <label>
                    <b>Tổng khách hàng: <span id="coutInbox" class="user-total">0</span></b>
                </label>
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-primary" id="search_customer">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                        Quét khách hàng
                        <div id="fchat_ai_loading_send" class="spinner-border d-none" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </a>
                </div>
                <div class="list_customer">
                    <textarea type="text" class="form-control" id="list_customer" name="list_customer" rows="10"
                    aria-describedby="inputGroupPrepend"></textarea>
                </div>
                <input type="hidden" name ="page_id" id='page_id' value="{{$fanpage->fanpage_id}}">
                <input type="hidden" name="page_token" id='page_token' value="{{$fanpage->fanpage_id_token}}">
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Khoảng cách tin nhắn(giây)</label>
                    <input type="number" class="form-control d-inline w-25" id="time" value="1">&nbsp;

                    <button type="button" onclick="sendMessage();" class="btn btn-primary ">
                        <svg height="1em" width="1em" viewBox="0 0 35 40"><g fill="none" fill-rule="evenodd"><g><path d="M31.1059281,19.4468693 L10.3449666,29.8224462 C8.94594087,30.5217547 7.49043432,29.0215929 8.17420251,27.6529892 C8.17420251,27.6529892 10.7473302,22.456697 11.4550902,21.0955966 C12.1628503,19.7344961 12.9730756,19.4988922 20.4970248,18.5264632 C20.7754304,18.4904474 21.0033531,18.2803547 21.0033531,17.9997309 C21.0033531,17.7196073 20.7754304,17.5095146 20.4970248,17.4734988 C12.9730756,16.5010698 12.1628503,16.2654659 11.4550902,14.9043654 C10.7473302,13.5437652 8.17420251,8.34697281 8.17420251,8.34697281 C7.49043432,6.9788693 8.94594087,5.47820732 10.3449666,6.1775158 L31.1059281,16.553593 C32.298024,17.1488555 32.298024,18.8511065 31.1059281,19.4468693" fill="#fff"></path></g></g></svg>
                        Gửi
                    </button>
                </div>
                <div class="input-group form-group" id="image_attachment_fcib_show">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v10.293l2.87-2.87a1 1 0 0 1 1.222-.15l1.77 1.06L9.75 7.69a1 1 0 0 1 1.52-.126L14 10.293V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0H4zM2 14v-.293l3.578-3.577 2.165 1.299.396.237.268-.375 2.157-3.02L14 11.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zM9.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zm-1.498 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Nhập Url hình ảnh của bạn (nếu có)..">
                </div>
                <div class="input-group form-group">
                <textarea type="text" class="form-control" name='messages' rows="8"
                    placeholder="Chào {full_name} bạn {hãy|vui lòng} {inbox|tin nhắn} để {được tư vấn|trao đổi trực tiếp} nhé" rows="5" id="messages"
                    aria-describedby="inputGroupPrepend" contenteditable></textarea>
                </div>
            </div>
            </div>
        </div>
    </form>
</section>
</div>
<script>
    function sendMessage(){
        let data = $('#form_send').serialize();
        $.ajax({
            method: "POST",
            url: "{{route('send')}}",
            data: data
        })
        .done(function( res ) {
            window.open(res);
            // open(res, "autoinbox", "height=500,width=500, status=yes");
        });
    }
</script>
@endsection
