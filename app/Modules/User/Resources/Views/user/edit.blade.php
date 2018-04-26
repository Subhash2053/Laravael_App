@extends('main::layout')
@section('title')  User edit @endsection
@section('breadcrumb')
    <li class="active"> User</li>  @endsection

@section('page_wise_js')
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('app/assets/js/pages/form_layouts.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/inputs/duallistbox.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('app/assets/js/pages/form_dual_listboxes.js')}}"></script>

@endsection

@section('content')
    <div class="col-md-12">

        <!-- Basic legend -->

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">User Edit</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {!! Form::model($user,['route' => ['user.update','id'=>$user->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

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
                            {!! Form::text('email', $value = null, ['id'=>'email','class'=>'form-control','placeholder'=>'E-mail','disabled']) !!}
                            @if($errors->first('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                    </div>
                    {{--<div class="form-group">
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
                    </div>--}}

                    <div class="form-group">
                        {!! Form::label('username','Username',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('username', $value = null, ['id'=>'username','class'=>'form-control','placeholder'=>'Username','disabled']) !!}
                            @if($errors->first('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif

                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::label('file_name', 'Image', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-lg-8">
                            <div class="thumbnail img-wrap">
                                 <span class="close" onclick="confirmFirst('FileVal')">
                                     <img src="{{asset('assets/lib/filemanager/close.png')}}" alt="close"/>
                                 </span>
                                <a class="standAloneFacnyBox"
                                   href="{{ route('standalone-filemanager',['filed_id'=>'FileVal']) }}">
                                    <img src="{{ $user->profile_image !='' ? $user->profile_image : URL::to('assets/images/no_img.png') }}"
                                         id="FileVal"/>
                                </a>
                            </div>
                            <p class="text-danger ">{{ $errors->first('profile_image') }}</p>
                            {!! Form::hidden('profile_image',$user->profile_image,['id'=>'hFileVal']) !!}
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
