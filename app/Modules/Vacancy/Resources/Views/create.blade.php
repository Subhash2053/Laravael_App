
@extends('backLayout.app')
@section('title')
    Vacancy|Create
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
                    <li><a href="{{ URL::to('dashboard/vacancy') }}"><i class="icon-users4 position-left"></i> Vacancy List</a>
                    </li>
                    <li class="active">Vacancy Create</li>
                </ul>
            </div>
            <!-- Basic layout-->
            <div class="panel panel-body">
                <div class="panel-body">

                    @include('flash::message')

                    {!! Form::open(['route'=>'vacancy.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"><i
                                    class="glyphicon glyphicon-floppy-disk"></i> Save
                        </button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{URL::to('dashboard/vacancy')}}"> <i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>

                    <div class="form-group">

                        {!! Form::label('title', 'Vacancy Name', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Name','class'=>'form-control required_label','required'=>'true']) !!}
                            <span class="error">{{ $errors->first('title') }}</span>
                        </div>
                    </div>




                    <div class="form-group">
                        {!! Form::label('detail', 'Description', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::textarea('detail',$value = null, ['id'=>'detail','placeholder'=>'Description','class'=>'summernote ']) !!}

                            <span class="error">{{ $errors->first('detail') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('skills', 'Skills', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::textarea('skills',$value = null, ['id'=>'skills','placeholder'=>'Skills','class'=>'summernote ']) !!}

                            <span class="error">{{ $errors->first('skills') }}</span>
                        </div>
                    </div>

                    <div class="form-group">

                        {!! Form::label('department_id', 'Department', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::select('department_id', $departments ,null, ['class'=>'form-control select-border-color border-warning required_label','id'=>'department_id','required'=>'true','placeholder'=>'Select Department']) !!}
                            <span class="error">{{ $errors->first('department_id') }}</span>
                        </div>
                    </div>



                   {{-- <div class="form-group">
                        {!! Form::label('degree', 'Education', ['class' => 'col-lg-3 control-label ']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('degree',$value = null, ['id'=>'degree','placeholder'=>'Degree','class'=>'form-control ']) !!}
                            <span class="error">{{ $errors->first('degree') }}</span>
                        </div>
                    </div>
--}}
                    <div class="form-group">
                        {!! Form::label('sort_order', 'Sort Order', ['class' => 'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('sort_order',$value = null, ['id'=>'link','placeholder'=>'Sort Order','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('sort_order') }}</span>
                        </div>
                    </div>





                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"><i
                                    class="glyphicon glyphicon-floppy-disk"></i> Save
                        </button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{URL::to('dashboard/vacancy')}}">
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



@endsection