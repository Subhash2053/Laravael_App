@extends('main::layout')
@section('title')  Change Password @endsection
@section('breadcrumb')  <li class="active"> Change Password</li>  @endsection

@section('content')
    <div class="col-md-12">

        <!-- Basic legend -->

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Change Password</h5>
            </div>

           <!--page content -->
            <div class="panel-body">
                @include('flash::message')
                {!! Form::open(['route'=>'setting.update.password','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                <fieldset>
                    <legend class="text-semibold">Fill Fields Properly</legend>
                <div class="form-group">
                    {!! Form::label('old_password', 'Old Password', ['class' => 'col-lg-3 control-label']) !!}

                    <div class="col-lg-9">
                        {!! Form::text('old_password', $value = null, ['id'=>'old_password','placeholder'=>'New Password','class'=>'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password', ['class' => 'col-lg-3 control-label']) !!}
                    <div class="col-lg-9">
                        {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Re-Type Password', ['class' => 'col-lg-3 control-label']) !!}
                    <div class="col-lg-9">

                        {!! Form::password('password_confirmation', ['id'=>'password_confirmation','placeholder'=>'Password','class'=>'form-control']) !!}
                        <span class="">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                </div>



                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit form <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>
                </fieldset>

                {!! Form::close() !!}

            </div>

        </div>
        <!--page content end  -->

        <!-- /basic legend -->

    </div>
@stop




