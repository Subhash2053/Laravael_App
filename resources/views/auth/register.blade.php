@extends('frontLayout.app')
@section('title')
    Register
@stop
@section('content')
    <div class="col-md-4"></div>
<div class="container-fluid main col-md-4 " style="margin-right: auto;margin-left: auto;">
    <div class="wrapper ">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Register</h1>
                <hr />
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{Session::get('status')}}!</strong> {!! Session::get('message') !!}
            </div>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="first_name" class="cols-sm-2 control-label">Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block register-button">
                                    Register
                                </button>

                        </div>
                    </form>
        <div class="login-register ">
            <a href="{{url('login')}}">Login</a>
            @if ($errors->has('global'))
                <span class="help-block danger">
                        <strong style="color:red" >{{ $errors->first('global') }}</strong>
                    </span>
            @endif
        </div>
    </div>
</div>


@endsection
