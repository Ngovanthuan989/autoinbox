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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/base/css/bootstrap.min.css')}}" type="text/css">
	    <link rel="stylesheet" href="{{ asset('public/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/SkinLte.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/base/css/style-base.css')}}"/>
    <!-- Css font size-->
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--    <link rel="stylesheet" href="assets/fonts/fontawesome-pro-5.14.0-web/css/all.min.css">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet">
    <!--CSS develop-->
    <link rel="stylesheet" href="{{ asset('public/assets/develop/css/style-develop.css')}}"/>
    <link rel="stylesheet" href="{{ asset('public/assets/base/WOW-master/css/libs/animate.css')}}">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
	
	<script src="{{ asset('public/assets/base/js/jquery.min.js')}}"></script>
	<script src="{{ asset('public/assets/base/js/cookie-jquery.js')}}"></script>
	<script src="{{ asset('public/assets/base/js/popper.min.js')}}"></script>
	<script src="{{ asset('public/assets/base/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('public/assets/base/js/jquery.easing.min.js')}}"></script>
	<!-- <script src="/assets/landing/js/scrollspy.min.js"></script>-->

	<!-- Owl Js -->
	<script src="{{ asset('public/assets/base/js/owl.carousel.min.js')}}"></script>

	<!-- Particles Js -->
	<script src="{{ asset('public/assets/base/js/particles.js')}}"></script>
	<script src="{{ asset('public/assets/base/js/particles.app.js')}}"></script>

	<!-- MFP JS -->
	<script src="{{ asset('public/assets/base/js/jquery.magnific-popup.min.js')}}"></script>

	<!-- Custom Js   -->
	<script src="{{ asset('public/assets/base/js/custom.js')}}"></script>
	<script src="{{ asset('public/assets/base/WOW-master/dist/wow.js')}}"></script>
	
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NVW6BPX');</script>
    <!-- End Google Tag Manager -->
    </script>
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
@yield('content')
  

<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );
    wow.init();
    document.getElementById('moar').onclick = function () {
        var section = document.createElement('section');
        section.className = 'section--purple wow fadeInDown';
        this.parentNode.insertBefore(section, this);
    };
</script>
    <div class="fb-customerchat" page_id="106110771355324"></div>
</body>
</html>
