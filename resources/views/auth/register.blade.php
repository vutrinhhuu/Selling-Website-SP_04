<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @if (config('voyager.multilingual.rtl')) dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>Admin - {{ Voyager::setting("admin.title") }}</title>
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @if (config('voyager.multilingual.rtl'))
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif
    <style>
        body {
            background-image:url('{{ Voyager::image( Voyager::setting("admin.bg_image"), asset("images/login/bg.jpeg") ) }}');
            background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
        }
        body.login .login-sidebar {
            border-top:5px solid {{ config('voyager.primary_color','#22A7F0') }};
        }
        @media (max-width: 767px) {
            body.login .login-sidebar {
                border-top:0px !important;
                border-left:5px solid {{ config('voyager.primary_color','#22A7F0') }};
            }
        }
        body.login .form-group-default.focused{
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                        <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                        <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                        <div class="copy animated fadeIn">
                            <h1>{{ Voyager::setting('admin.description', 'Voyager') }}</h1>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            <div class="login-container" style="top:30%;">

                <p>Join with us</p>

                <form action="{{ route('postRegister') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                         </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>{{ __('voyager::generic.password') }}</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="usernameGroup">
                        <label>Username</label>
                        <div class="controls">
                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="fullnameGroup">
                        <label>Fullname</label>
                        <div class="controls">
                            <input type="text" name="fullname" placeholder="Fullname" class="form-control">
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="addressGroup">
                        <label>Address</label>
                        <div class="controls">
                            <input type="text" name="address" placeholder="Address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group form-group-default" id="phoneGroup">
                        <label>Phone Number</label>
                        <div class="controls">
                            <input type="phone" name="phone" placeholder="Phone Number" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block login-button">
                        <span class="signin">Register</span>
                    </button>

              </form>

              <div style="clear:both"></div>

              @if(!$errors->isEmpty())
              <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
              </div>
              @endif

            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    var username = document.querySelector('[name="username"]');
    var fullname = document.querySelector('[name="fullname"]');
    var address = document.querySelector('[name="address"]');
    var phone = document.querySelector('[name="phone"]');
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");

    // Focus events for email and password fields
    email.addEventListener('focusin', function(e){
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function(e){
       document.getElementById('emailGroup').classList.remove("focused");
    });

    password.addEventListener('focusin', function(e){
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function(e){
       document.getElementById('passwordGroup').classList.remove("focused");
    });

    username.addEventListener('focusin', function(e){
        document.getElementById('usernameGroup').classList.add("focused");
    });
    username.addEventListener('focusout', function(e){
       document.getElementById('usernameGroup').classList.remove("focused");
    });

    fullname.addEventListener('focusin', function(e){
        document.getElementById('fullnameGroup').classList.add("focused");
    });
    fullname.addEventListener('focusout', function(e){
       document.getElementById('fullnameGroup').classList.remove("focused");
    });

    address.addEventListener('focusin', function(e){
        document.getElementById('addressGroup').classList.add("focused");
    });
    address.addEventListener('focusout', function(e){
       document.getElementById('addressGroup').classList.remove("focused");
    });

    phone.addEventListener('focusin', function(e){
        document.getElementById('phoneGroup').classList.add("focused");
    });
    phone.addEventListener('focusout', function(e){
       document.getElementById('phoneGroup').classList.remove("focused");
    });

</script>
</body>
</html>
