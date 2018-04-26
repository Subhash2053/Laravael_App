@extends('admin::layout')
@section('title')Admin ! Dashboard
@endsection
@section('content')
    <div class="container">
        <div class="box_layout">
            <div class="heading">Change Password</div>
            <div class="content">
                <div class="form-group">

                    <div class="form-group">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('user.changePassword.post') }}">
                            {{ csrf_field() }}

                            <div class="box-group">
                                {!! Form::label('Current Password') !!}
                                {!! Form::password('current_password', $value = null, ['id'=>'password','placeholder'=>'password','class'=>'form-control']) !!}
                                @if($errors->first('current_password'))
                                    <div class="msg-error" style="display: block">{{ $errors->first('current_password') }}</div>
                                @endif
                            </div>
                            <div class="box-group">
                                {!! Form::label('New Password') !!}
                                {!! Form::password('password', $value = null, ['id'=>'current_password','placeholder'=>'Password','class'=>'form-control']) !!}
                                @if($errors->first('password'))
                                    <div class="msg-error">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="box-group">
                                {!! Form::label('Confirm Password') !!}
                                {!! Form::password('password_confirmation', $value = null, ['id'=>'password_confirmation','placeholder'=>'Confirm Password','class'=>'form-control']) !!}
                                @if($errors->first('password_confirmation'))
                                    <div class="msg-error">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                            <div class="box-group">
                                <div class="inline">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
