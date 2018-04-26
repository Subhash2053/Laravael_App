@extends('admin::layout')
@section('title')  User Add @endsection
@section('breadcrumb')  <li class="active"> User</li>  @endsection

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
@section('page_wise_js')
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>


@endsection

@section('content')
    <div class="col-md-12">

        <!-- Basic legend -->

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">User Add</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'user.store','method'=>'POST','class'=>'form-horizontal','user'=>'form','files' => true]) !!}


                <fieldset>
                    <legend class="text-semibold">Fill Fields Properly</legend>


                    <div class="form-group">
                        {!! Form::label('name','Full Name',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('name', $value = null, ['id'=>'name','class'=>'form-control','placeholder'=>'Full Name']) !!}
                            @if($errors->first('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','E-mail',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('email', $value = null, ['id'=>'email','class'=>'form-control','placeholder'=>'E-mail']) !!}
                            @if($errors->first('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone','Phone',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('phone', $value = null, ['id'=>'phone','class'=>'form-control','placeholder'=>'Phone']) !!}
                            @if($errors->first('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('address','Address',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('address', $value = null, ['id'=>'address','class'=>'form-control','placeholder'=>'Address']) !!}
                            @if($errors->first('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('username','Username',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('username', $value = null, ['id'=>'username','class'=>'form-control','placeholder'=>'Username']) !!}
                            @if($errors->first('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('password','Password',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Password']) !!}
                            @if($errors->first('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>


                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation','Confirm Password',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::password('password_confirmation',['id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                            @if($errors->first('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">Profile Image</label>
                        <div class="col-lg-9">
                            {!! Form::file('profile_image', ['class' => 'file-styled']) !!}

                        </div>
                    </div>

                </fieldset>

                <div class="text-right">
                    <div class="form-wizard-actions">
                        {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
                        <button class="btn btn-default" id="step-back" action="action"
                                onclick="window.history.go(-1); return false;" type="reset">Back
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

        </div>

        <!-- /basic legend -->

    </div>
@stop
@section('footer_script')
    <script type="text/javascript">
        $(document).ready(function () {
            Switchery.prototype.disabled = function (b) {
                this.options.disabled = this.element.disabled = !!b;
                if (b) {
                    this.switcher.style.opacity = this.options.disabledOpacity;
                } else {
                    this.switcher.style.opacity = 1.0;
                }
            };

            Switchery.prototype.handleClick = function () {
                var self = this, switcher = this.switcher, parent = self.element.parentNode.tagName.toLowerCase(), labelParent = parent === "label" ? false : true;
                if (this.isDisabled() === false) {
                    fastclick(switcher);
                    if (switcher.addEventListener) {
                        switcher.addEventListener("click", function () {
                            if (self.isDisabled() === true) return;//<-dont handle click if disabled

                            self.setPosition(labelParent);
                            self.handleOnchange(self.element.checked)
                        })
                    } else {
                        switcher.attachEvent("onclick", function () {
                            if (self.isDisabled() === true) return;//<-dont handle click if disabled

                            self.setPosition(labelParent);
                            self.handleOnchange(self.element.checked)
                        })
                    }
                } else {
                    this.element.disabled = true;
                    this.switcher.style.opacity = this.options.disabledOpacity
                }
            };
        });
    </script>
@endsection
