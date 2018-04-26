@extends('admin::layout')
@section('title')  Role Add @endsection
@section('breadcrumb')  <li class="active"> Role</li>  @endsection

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
                <h5 class="panel-title">Role Add</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'role.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}


                <fieldset>
                    <legend class="text-semibold">Fill Fields Properly</legend>

                    <div class="form-group">
                        {!! Form::label('name','Role Name',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('name', $value = null, ['id'=>'name','class'=>'form-control','placeholder'=>'Role Name']) !!}
                            @if($errors->first('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif

                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::label('sort_order','Sort order',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('sort_order', $value = null, ['id'=>'sort_order','class'=>'form-control','placeholder'=>'Sort Order']) !!}
                            @if($errors->first('sort_order'))
                                <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('roles','Permissions',['class'=>'col-lg-3 control-label']) !!}

                        <div class="col-lg-9">

                            {!! Form::select('route_name[]',$routes,null, ['multiple'=>'multiple','class'=>' form-control listbox','id'=>'country_id']) !!}


                            @if($errors->first('route_name'))
                                <span class="text-danger">{{ $errors->first('route_name') }}</span>
                            @endif
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
