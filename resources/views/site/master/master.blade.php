<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name='description'  content='Gửi tin nhắn hàng loạt cho khách cũ trên FANPAGE với nội dung chứa quảng cáo kèm ảnh, Link'/>
    <meta name='keywords' content='Auto Inbox'/>
    <meta http-equiv="content-language" content="vi"/>
    <link ref='canonical' href='https://fchat.ai'/>
    <meta name="robots" content="index,follow,noodp"/>
    <meta name="copyright" content="Fchat Auto Inbox"/>
    <meta name="abstract" content="/"/>
    <meta name="distribution" content="global">
    <meta name="author" content="Fchat Auto Inbox"/>
    <meta name="language" content="vietnamese"/>
    <meta property="fb:app_id" content="1522977441056198"/>
    <meta property="og:site_name" content="Fchat Auto Inbox"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://fchat.ai"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:title" content="Fchat Auto Inbox"/>
	<meta property="og:image" content="{{ asset('public/assets/Banner-Fchat.jpg')}}" />
    <meta property="og:image:alt" content="Fchat Auto Inbox" />
    <meta property="og:description"
          content="Gửi tin nhắn hàng loạt cho khách cũ trên FANPAGE với nội dung chứa quảng cáo kèm ảnh, Link"/>
    <!-- Site favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/favicon.png')}}">
	<!--link rel="icon" href="{{ asset('public/assets/favicon.png')}}" type="image/gif" sizes="16x16"-->
	<meta charset="utf-8">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<!-- JQVMap -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/dist/css/adminlte.min.css') }}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
	<!-- summernote -->
	<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/summernote/summernote-bs4.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		
	<!-- jQuery -->
	<script src="{{ asset('public/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('public/AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- ChartJS -->
	<script src="{{ asset('public/AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
	<!-- Sparkline -->
	<script src="{{ asset('public/AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
	<!-- JQVMap -->
	<script src="{{ asset('public/AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('public/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
	<!-- jQuery Knob Chart -->
	<script src="{{ asset('public/AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
	<!-- daterangepicker -->
	<script src="{{ asset('public/AdminLTE/plugins/moment/moment.min.js') }}"></script>
	<script src="{{ asset('public/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="{{ asset('public/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
	<!-- Summernote -->
	<script src="{{ asset('public/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('public/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('public/AdminLTE/dist/js/adminlte.js') }}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset('public/AdminLTE/dist/js/pages/dashboard.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('public/AdminLTE/dist/js/demo.js') }}"></script>
	<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NVW6BPX');</script>
    <!-- End Google Tag Manager -->
	</script>
	<style>
		.content-wrapper{
			background: #fff;
			padding-left: 15px;
			padding-right: 15px;
		}
	</style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVW6BPX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="fb-root"></div>
 <script>
	window.fbAsyncInit = function() {
		FB.init({
			appId: "2910598669043849",
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
				{{--url: "{{route('login_facebook')}}",--}}
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

	{{--<script type="text/javascript">--}}
	    {{--if(!$.cookie('banner_show')){--}}
	        {{--setTimeout(function(){ --}}
	            {{--showBannder();--}}
	        {{--}, 3000);--}}
	       {{----}}
	        {{--function showBannder(){--}}
	            {{--$('#modal_banner').modal('show'); --}}
	            {{--$.cookie('banner_show', true, { expires : 7 });--}}
	        {{--}--}}
	    {{--}--}}
	    {{--else{--}}
	    {{--}--}}
	{{--</script>--}}

<div class="wrapper">
	@include('site.master.nav')
	@include('site.master.siderbar')
	<div class="content-wrapper">
		@yield('content')
	</div>
</div>
    <div class="fb-customerchat" page_id="106110771355324"></div>
</body>
</html>
