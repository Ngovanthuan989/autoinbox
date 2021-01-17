<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLogin">
    Login
</button>
<!-- The Modal -->
<div class="modal" id="modalLogin">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <!-- Modal body -->
      <div class="modal-body">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" 
                aria-controls="login" aria-selected="true">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                aria-controls="register" aria-selected="false">Đăng ký</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="{{route('login_site')}}" method="post">
                        @csrf
                        <div class="head mt-2 text-center">
                            <img src="/public/images/favicon.png" width="50px" id="src-logo">
                            <h3 class="text-primary">Đăng nhập</h3>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Mật khẩu:</label><br>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div>
                        @if (\Session::has('error-login'))
                        <p class="text-danger">{{\Session::get('error-login')}}</p>
                        @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                <div id="register-box" class="col-md-12">
                    <form id="register-form" class="form" action="{{route('regitser')}}" method="post">
                        @csrf
                        <div class="head mt-2 text-center">
                            <img src="/public/images/favicon.png" width="50px" id="src-logo">
                            <h3 class="text-primary">Đăng ký</h3>
                        </div>
                        <div class="form-group">
                            <label for="name" class="text-info">Họ tên :</label><br>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
                            @if ($errors->has('name'))
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}"  required>
                            @if ($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-info">Số điện thoại:</label><br>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}"  required>
                            @if ($errors->has('phone'))
                            <p class="text-danger">{{$errors->first('phone')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Mật khẩu:</label><br>
                            <input type="password" name="password" id="password" class="form-control" required>
                            @if ($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-md">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            
      </div>
    </div>
  </div>
</div>
@if ($errors->any())
<script>
    $('#modalLogin').modal('show');
    $('#register-tab').addClass('active');
    $('#login-tab').removeClass('active');
    $('#login').removeClass(' show active');
    $('#register').addClass(' show active');
</script>
@endif

@if (\Session::has('error-login'))
<script>
    $('#modalLogin').modal('show');
</script>
@endif

<script>
    // function register(){
    //     $.ajax({
    //         method: "POST",
    //         url: "{{route('regitser')}}",
    //         data: $('#register-form').serialize()
    //     })
    //     .done(function( msg ) {
    //         alert( "Data Saved: " + msg );
    //     });
    // }
  
</script>