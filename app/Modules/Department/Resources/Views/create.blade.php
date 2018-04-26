@extends('backLayout.app')
@section('title') Create  Department @endsection
@section('breadcrumb')
    <li class="active"> Department </li>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i
                            class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li><a href="{{ route('department.index') }}"><i class="icon-cabinet position-left"></i> Department List</a></li>
                    <li class="active">Department Create</li>
                </ul>
            </div>
            <!-- Basic layout-->
            <div class="panel panel-body border-top-info">
                <div class="panel-body">

                    @include('flash::message')

                    {!! Form::open(['route'=>'department.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"> <i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{route('department.index')}}"> <i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>

                    <div class="form-group">

                        {!! Form::label('title', 'Title', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Name','class'=>'form-control required_label']) !!}
                            <span class="error">{{ $errors->first('title') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('file_name', 'Image:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-3">
                            <div class="thumbnail img-wrap">
                                                           <span class="close" onclick="confirmFirst('FileVal')">
                                                                <img src="{{asset('assets/lib/filemanager/close.png')}}"
                                                                     alt="close"/>
                                                           </span>
                                <a class="standAloneFacnyBox"
                                   href="{{ route('standalone-filemanager',['filed_id'=>'FileVal']) }}">
                                    <img src="{{ old('file_name') !=null ? old('file_name') : URL::to('assets/lib/filemanager/no_img.png') }}"
                                         id="FileVal"/>
                                </a>
                            </div>

                            {!! Form::hidden('file_name',null,['id'=>'hFileVal']) !!}
                            <span class="error">{{ $errors->first('file_name') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('intro_text', 'Intro Text', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('intro_text',$value = null, ['id'=>'intro_text','placeholder'=>'into text','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('intro_text') }}</span>
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
                        {!! Form::label('sort_order', 'Sort Order', ['class' => 'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('sort_order',$value = null, ['id'=>'link','placeholder'=>'Sort Order','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('sort_order') }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-rounded btn-success btn-raised active"> <i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{route('department.index')}}"> <i class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>

            <!-- /basic layout -->

        </div>
    </div>
@endsection

