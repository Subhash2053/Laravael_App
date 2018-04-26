@extends('site::layout')

@inject('imagePath', 'App\Services\ImagePathService')

@inject('realDate', 'App\Services\DateService')

@inject('trunkEditor', 'App\Services\EditorTruncate')

@section('content')

    <section id="credential">
        <div class="container">
            <div class="col-12">
                <div class="login">
                    <div class="box">
                        <div class="head">Sign up</div>
                        <div class="signupLink">Already have an account?<a href="{{route('login')}}"> Sign In</a></div>
                        <form action="{{route('userRegister')}}" method="POST">
                            {{csrf_field()}}
                            <div class="nameblock">
                                @if($errors->first('name')) <p class="error">{{ $errors->first('name') }}</p>  @endif
                                <p><input type="text" name="name" value="" placeholder="Full Name"></p>
                            </div>
                            <div class="nameblock">
                                @if($errors->first('username')) <p class="error">{{ $errors->first('username') }}</p>  @endif
                                <p><input type="text" name="username" value="" placeholder="Username"></p>
                            </div>
                            <div class="emailblock">
                                @if($errors->first('email')) <p class="error">{{ $errors->first('email') }}</p>  @endif
                                <p><input type="email" name="email" value="" placeholder="Email"></p>
                            </div>
                            <div class="passwordblock">
                                @if($errors->first('password')) <p class="error">{{ $errors->first('password') }}</p>  @endif
                                <p><input type="password" id="password" name="password" value="" placeholder="Password">
                                </p>
                            </div>
                            <div class="passwordblock">
                                <p><input type="password" id="password" value="" name="password_confirmation" placeholder="Confirm Password">
                                </p>
                            </div>
                            <p><button type="submit">Sign in</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
