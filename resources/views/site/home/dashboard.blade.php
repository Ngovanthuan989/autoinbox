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

            <div class="form-group">
                <b><label>Chọn trang</label></b>
                <select name="fanpage_page" class="form-control" id="page_select">
                    <option value="">Chọn page</option>
                </select>
            </div>
            <label>
                <b>Tổng khách hàng: <span id="coutInbox" class="user-total">0</span></b>
            </label>
            <div class="list_customer">
                <textarea type="text" class="form-control" id="list_customer" name="list_customer" rows="5"
                          aria-describedby="inputGroupPrepend"></textarea>
            </div>
            <div class="input-group form-group pt-3 text-center">
                <button class="btn btn-primary" id="search_customer">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                    Quét khách hàng
                    <div id="fchat_ai_loading_send" class="spinner-border d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
        <div class="col-md-7">
            <label>
                <b>Nội dung </b>
            </label>
            <div class="input-group form-group">

                <textarea type="text" class="form-control" name='messages' rows="10"
                          placeholder="Chào {full_name} bạn {hãy|vui lòng} {inbox|tin nhắn} để {được tư vấn|trao đổi trực tiếp} nhé" rows="5" id="messages"
                          aria-describedby="inputGroupPrepend" contenteditable></textarea>
            </div>
            <p>
                <a href="javascript:void(0);" id="image_attachment_fcib">Gửi ảnh đính kèm</a>
            </p>
            <div class="input-group form-group" id="image_attachment_fcib_show" style="display:none;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">
                       <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v10.293l2.87-2.87a1 1 0 0 1 1.222-.15l1.77 1.06L9.75 7.69a1 1 0 0 1 1.52-.126L14 10.293V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0H4zM2 14v-.293l3.578-3.577 2.165 1.299.396.237.268-.375 2.157-3.02L14 11.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zM9.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zm-1.498 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                    </span>
                </div>
                <input type="text" class="form-control" id="image_url" placeholder="Nhập Url hình ảnh của bạn (nếu có)..">
            </div>
            <label>Khoảng cách gửi giữa các tin nhắn</label>
            <div class="time_ext input-group form-group w-25">
                <input type="number" class="form-control" id="time" value="1">&nbsp;
                <span class="fchat_exten_time_delay">giây</span>
            </div>
            <div class="form-group">
                <div id="phone_extension_return">
                    <button id="button_send" class="btn btn-primary conv_get_phone btn btn-primary mt-20 mb-20">
                        <svg height="28px" width="28px" viewBox="0 0 35 40"><g fill="none" fill-rule="evenodd"><g><path d="M31.1059281,19.4468693 L10.3449666,29.8224462 C8.94594087,30.5217547 7.49043432,29.0215929 8.17420251,27.6529892 C8.17420251,27.6529892 10.7473302,22.456697 11.4550902,21.0955966 C12.1628503,19.7344961 12.9730756,19.4988922 20.4970248,18.5264632 C20.7754304,18.4904474 21.0033531,18.2803547 21.0033531,17.9997309 C21.0033531,17.7196073 20.7754304,17.5095146 20.4970248,17.4734988 C12.9730756,16.5010698 12.1628503,16.2654659 11.4550902,14.9043654 C10.7473302,13.5437652 8.17420251,8.34697281 8.17420251,8.34697281 C7.49043432,6.9788693 8.94594087,5.47820732 10.3449666,6.1775158 L31.1059281,16.553593 C32.298024,17.1488555 32.298024,18.8511065 31.1059281,19.4468693" fill="#fff"></path></g></g></svg>
                        Gửi</button>
                    <div id="loading_icon" class="d-none">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span>Vui Lòng đợi...</span>
                    </div>
                </div>
            </div>
            <div class="response pb-3" style="height:60px; max-height:60px">
                <div id="form_return" style="visibility:hidden;">
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
</div>
<script>

	window.fbAsyncInit = function() {
		FB.init({
			appId: "475816949623557",
			xfbml: true,
			version: "v4.0"
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) { return; }
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	function login(){
		FB.login(function(response){

			if(response.status === 'connected'){
				var url = window.location.href;
				var arguments = url.split('?');
				var ip = $('body').find('input[name=ip]').val();
				var token = response.authResponse.accessToken;
				getInfo(arguments[1], ip, token);
			} else if(response.status === 'not_authorized') {
				console.log(response.status);
			} else {
				console.log(response.status);
			}

		}, {scope: 'email'});
	}
	
	function getInfo(params, ip, token) {
		FB.api('/me', 'GET', {fields: 'id, name, email, picture, birthday'}, function(response) {
			var email = '';
			if(response['email']){
				email = response['email'];
			}
			response['token'] = token;
			$.ajax({
				url: "{{route('login_facebook')}}",
				type: 'get',
				data: response,
				success: function (data) {
					var myCookies = getCookies();
					console.log('== data');
					console.log(data);
					if(data.status == 0){
						localStorage.setItem('name', data.dataAcc.name);
						localStorage.setItem('email', data.dataAcc.email);
						localStorage.setItem('phone', data.dataAcc.phone);
						localStorage.setItem('token', data.dataAcc.token);
						localStorage.setItem('facebook_id', data.dataAcc.facebook_id);
					}
						location.href = data.url;
				}
			})
		});
	}
	var getCookies = function(){
		var pairs = document.cookie.split(";");
	    var cookies = {};
	  	for (var i=0; i<pairs.length; i++){
			var pair = pairs[i].split("=");
			cookies[(pair[0]+'').trim()] = unescape(pair.slice(1).join('='));
	  	}
	  	return cookies;
	}
	</script>
@endsection
