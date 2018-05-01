@extends('backLayout.app')
@section('title') Update  Employee @endsection
@php
    $allowedAvailabilities = 5
@endphp
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-line head-title"><a class="breadcrumb-elements-toggle"><i
                            class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li><a href="{{ route('employee.index') }}"><i class="icon-users4 position-left"></i> Employee List</a>
                    </li>
                    <li class="active">Employee Update</li>
                </ul>
            </div>
            <!-- Basic layout-->

            <div class="panel panel-flat">

                <div class="panel-body">

                    {!! Form::model($employee,['method'=>'PUT','route'=>['employee.update',$employee->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    @include('flash::message')
                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"><i
                                    class="glyphicon glyphicon-floppy-disk"></i> Save
                        </button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{route('employee.index')}}"> <i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Name','class'=>'form-control']) !!}
                        </div>
                        <span class="error">{{ $errors->first('name') }}</span>
                    </div>


                    <div class="form-group">
                        {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-md-3 control-label required_label']) !!}
                        <div class="col-lg-8">
                            <div class="thumbnail img-wrap">
                                 <span class="close" onclick="confirmFirst('FileVal')">
                                     <img src="{{asset('assets/lib/filemanager/close.png')}}" alt="close"/>
                                 </span>
                                <a class="standAloneFacnyBox"
                                   href="{{ route('standalone-filemanager',['filed_id'=>'FileVal']) }}">
                                    <img src="{{ $employee->profile_image !='' ? $employee->profile_image : URL::to('assets/images/no-image.jpg') }}"
                                         id="FileVal" style="width: 300px;height: 300px;"/>
                                </a>
                            </div>
                            <p class="text-danger ">{{ $errors->first('profile_image') }}</p>
                            {!! Form::hidden('profile_image',$employee->profile_image,['id'=>'hFileVal']) !!}
                        </div>
                        <span class="error">{{ $errors->first('profile_image') }}</span>
                    </div>

                    <div class="form-group">

                        {!! Form::label('detail', 'Short Description', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::text('detail', $value = null, ['id'=>'name','placeholder'=>'Short Description','class'=>'form-control required_label','required'=>'true']) !!}
                            <span class="error">{{ $errors->first('detail') }}</span>
                        </div>
                    </div>

                    <div class="form-group">

                        {!! Form::label('department', 'Department', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::select('department_id',$departments,null,['class'=>'form-control select','placeholder'=>'Select Department']) !!}
                            <span class="error">{{ $errors->first('department_id') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('designation', 'Designation', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('designation', $value = null, ['id'=>'designation','placeholder'=>'designation','class'=>'form-control']) !!}

                        </div>
                        <span class="error">{{ $errors->first('designation') }}</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('specialization', 'Specialization', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('specialization', $value = null, ['id'=>'specialization','placeholder'=>'specialization','class'=>'form-control']) !!}

                        </div>
                        <span class="error">{{ $errors->first('specialization') }}</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('degree', 'Education', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('degree', $value = null, ['id'=>'degree','placeholder'=>'degree','class'=>'form-control']) !!}

                        </div>
                        <span class="error">{{ $errors->first('degree') }}</span>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sort_order',$value = null, ['class' => 'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('sort_order',$value = null, ['id'=>'link','placeholder'=>'Sort Order','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('sort_order') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('availability', 'Availability', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-md-9">
                            <table class="table">
                                <tr class="bg-info">
                                    <td>ID</td>
                                    <td>Day</td>
                                    <td>Time</td>
                                    <td>Delete</td>
                                </tr>
                                @foreach($employee->availabilities as $key=>$availability)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $availability->day }}</td>
                                        <td>{{ $availability->time }}</td>
                                        <td><a onclick="return confirm('Are you sure you want to delete this item?');"
                                               href="{{route('availability.delete',['id'=>$availability->id,'emp_id'=>$employee->id])}}"><i
                                                        class="icon-trash text-danger"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                            @if(count($employee->availabilities)< $allowedAvailabilities)
                                <div class="input_fields_wrap">
                                    <div class="col-md-6">
                                        {!! Form::text('available_day[]', $value = null, ['id'=>'day','class'=>'form-control','placeholder'=>'Available Day']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::text('available_time[]', $value = null, ['id'=>'time','class'=>'form-control','placeholder'=>'Available Time']) !!}
                                    </div>

                                </div>

                                <button class="add_field_button">Add More Fields</button>
                            @endif
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"><i
                                    class="glyphicon glyphicon-floppy-disk"></i> Save
                        </button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{route('employee.index')}}"> <i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>

            <!-- /basic layout -->

        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            var max_fields = '{{ $allowedAvailabilities-count($employee->availabilities) }}'; //maximum input boxes allowed
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
                    swal("Max field reached " + max_fields + " allowed");
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
