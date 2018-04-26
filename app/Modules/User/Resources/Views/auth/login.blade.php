<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Birat Hospital Login </title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/login.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /theme JS files -->
</head>

<body class="navbar-bottom login-container">
<!-- /main navbar -->
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            {!! Form::open(['route' => 'login-post','method'=>'POST','id'=>'sign_in']) !!}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">Login to your account
                        <small class="display-block">Your credentials</small>
                    </h5>
                </div>
                @include('flash::message')
                <div class="form-group has-feedback has-feedback-left">
                    {!! Form::text('login', $value = null, ['id'=>'login','placeholder'=>'Email or Username','class'=>'form-control','autofocus']) !!}
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                    <span class="text-danger">{{ $errors->first('login') }}</span>
                </div>
                <div class="form-group has-feedback has-feedback-left">
                    {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control']) !!}
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                <div class="form-group login-options">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                {!! Form::checkbox('remember',1,false, ['id'=>'remember_me','class'=>'filled-in chk-col-pink']) !!}
                                Remember
                            </label>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">Login <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>
