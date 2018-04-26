
@extends('backLayout.app')
@section('title')
    Employee|Create
@stop

@section('style')

@stop
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-line head-title"><a class="breadcrumb-elements-toggle"><i
                            class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li><a href="{{ URL::to('dashboard/employee') }}"><i class="icon-users4 position-left"></i> Employee List</a>
                    </li>
                    <li class="active">Employee Create</li>
                </ul>
            </div>
            <!-- Basic layout-->
            <div class="panel panel-body">
                <div class="panel-body">

                    @include('flash::message')

                    {!! Form::open(['route'=>'employee.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"><i
                                    class="glyphicon glyphicon-floppy-disk"></i> Save
                        </button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{URL::to('dashboard/employee')}}"> <i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Employee Name', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Name','class'=>'form-control required_label','required'=>'true']) !!}
                            <span class="error">{{ $errors->first('name') }}</span>
                        </div>
                    </div>



                    <div class="form-group">
                        {!! Form::label('profile_image', 'Profile Image:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-3">
                            <div class="thumbnail img-wrap">
                                                           <span class="close" onclick="confirmFirst('FileVal')">
                                                                <img src="{{asset('assets/lib/filemanager/close.png')}}"
                                                                     alt="close"/>
                                                           </span>
                                <a class="standAloneFacnyBox"
                                   href="{{ route('standalone-filemanager',['filed_id'=>'FileVal']) }}">
                                    <img src="{{ old('profile_image') !=null ? old('profile_image') : URL::to('assets/lib/filemanager/no_img.png') }}"
                                         id="FileVal"/>
                                </a>
                            </div>
                            {!! Form::hidden('profile_image',null,['id'=>'hFileVal']) !!}
                            <span class="error">{{ $errors->first('profile_image') }}</span>
                        </div>
                    </div>

                    <div class="form-group">

                        {!! Form::label('detail', 'Short Description', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::text('detail', $value = null, ['id'=>'name','placeholder'=>'Short Description','class'=>'form-control required_label','required'=>'true']) !!}
                            <span class="error">{{ $errors->first('detail') }}</span>
                        </div>
                    </div>

                    <div class="form-group">

                        {!! Form::label('department_id', 'Department', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::select('department_id', $departments ,null, ['class'=>'form-control select-border-color border-warning required_label','id'=>'department_id','required'=>'true','placeholder'=>'Select Department']) !!}
                            <span class="error">{{ $errors->first('department_id') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('designation', 'Designation', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('designation',$value = null, ['id'=>'designation','placeholder'=>'Designation','class'=>'form-control required_label']) !!}
                            <span class="error">{{ $errors->first('designation') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('specialization', 'Specialization', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('specialization',$value = null, ['id'=>'specialization','placeholder'=>'Specialization','class'=>'form-control required_label']) !!}
                            <span class="error">{{ $errors->first('specialization') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('degree', 'Education', ['class' => 'col-lg-3 control-label ']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('degree',$value = null, ['id'=>'degree','placeholder'=>'Degree','class'=>'form-control ']) !!}
                            <span class="error">{{ $errors->first('degree') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sort_order', 'Sort Order', ['class' => 'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('sort_order',$value = null, ['id'=>'link','placeholder'=>'Sort Order','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('sort_order') }}</span>
                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::label('availability', 'Availability', ['class' => 'col-lg-3 control-label required_label']) !!}
                        <div class="col-md-9">
                            <button class="add_field_button">Add More Fields</button>
                            <div class="input_fields_wrap">
                                <div class="col-md-6">
                                    {!! Form::text('available_day[]', $value = null, ['id'=>'day','class'=>'form-control','placeholder'=>'Available Day','required'=>false]) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('available_time[]', $value = null, ['id'=>'time','class'=>'form-control','placeholder'=>'Available Time','required'=>false]) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"><i
                                    class="glyphicon glyphicon-floppy-disk"></i> Save
                        </button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{URL::to('dashboard/employee')}}">
                            <i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>
                    {!! Form::close() !!}

                </div>
                <!-- /basic layout -->
            </div>
        </div>

    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var max_fields = 5; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div>' +
                        '<div class="col-md-6">' +
                        '<input type="text" name="available_day[]" class="form-control" placeholder="Available Day" required/>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<input type="text" name="available_time[]" class="form-control" placeholder="Available Time" required/>' +
                        '</div>' +
                        '<a href="#" class="remove_field" style="color:red;">Remove</a>' +
                        '</div>'); //add input box
                } else {
                    alert("Max field reached. " + max_fields + " allowed");
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })


        });
    </script>


@endsection