
@extends('backLayout.app')
@section('title')
    Department| Index
@stop

@section('style')

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />



@stop
@section('content')


    <!-- Highlighting rows and columns -->
    <div class="panel panel-flat border-top-info " >
        <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">department <span class="badge badge-info">{{ count($departments) }}</span></li>
            </ul>
        </div>
        <div class="panel-heading">
            <div class="col-xs-5">
                <form action="{{ URL::to('department/index') }}" method="GET">
                    <div class="form-group input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search Banner" required/>
                        <label class="input-group-btn">
                            <button type="submit" class="btn btn-material-orange btn-flat"
                                    type="button">
                                <i class="fa fa-search">
                                </i>
                                Find
                            </button>
                        </label>
                    </div>
                </form>
            </div>
            <ul class="icons-list pull-right">
                <li>
                    <a href="{{URL::to('dashboard/department/create')}}">
                        <button type="button" class="btn bg-teal-400 btn-labeled btn-rounded legitRipple">
                            <b><i class="icon-plus22"></i></b> Create
                        </button>
                    </a>
                </li>

                <li>
                    <button type="button" class="btn bg-pink-800 btn-labeled btn-rounded legitRipple"
                            onclick="confirmAndSubmitForm()">
                        <b><i class="icon-trash"></i></b> Delete
                    </button>
                </li>

            </ul>

        </div>
        <br>
        <div class="panel-body">
            @include('flash::message')
        </div>
        {!! Form::open(['route' => 'department.destroy','method'=>'DELETE','id'=>'formDelete']) !!}


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <a href="{{ URL::to('dashboard/department') }}">
                            ID
                            <span><i class="fa fa-sort text-success"></i></span>
                        </a>

                    </th>
                    <th>
                        <div class="pretty p-default">
                            <input type="checkbox" id="checkAll"/>
                            <div class="state">
                                <label>Check All</label>
                            </div>
                        </div>
                    </th>
                  {{--  <th>Image</th>--}}
                    <th>
                        <a href="{{ URL::to('dashboard/department') }}">
                            Name
                            <span><i class="fa fa-sort text-success"></i></span>
                        </a>
                    </th>




                    <th>
                        <a href="{{ URL::to('department/index') }}"
                           class="grey">
                            Created Date
                            <span><i class="fa fa-sort text-success"></i></span>
                        </a>
                    </th>

                    <th class="text-center">Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @forelse($departments as $department)
                    <tr>
                        <td>{{$i}}</td>
                        <?php $i++; ?>
                        <td>
                            <div class="pretty p-default">
                                {!! Form::checkbox('toDelete[]',$department->id, false,['class'=>'checkItem']) !!}
                                <div class="state">
                                    <label></label>
                                </div>
                            </div>
                        </td>
                       {{-- <td>

                            @if($department->file_name)
                                <a href="{{ $department->file_name }}" class="highslide shadow-z-4"
                                   onclick="return hs.expand(this)">
                                    <img src="{{$department->file_name}}" width="85"
                                         alt="{{ $department->name }}" class="img-thumbnail"/>
                                </a>
                            @else
                                <a href="{{ asset('asset/lib/no_avatar.jpg') }}" class="highslide shadow-z-4"
                                   onclick="return hs.expand(this)">
                                    <img src="{{ asset('asset/lib/no_avatar.jpg') }}" width="85"
                                         alt="{{ $department->name }}" class="img-thumbnail"/>
                                </a>
                            @endif
                        </td>--}}

                                                <td>{{$department->title}}</td>
                        <td>{{$department->created_at}}</td>

                        <td class="text-center">
                            <a href="{{route('department.edit',$department->id)}}">
                                <img src="{{ asset('assets/images/edit.png') }}" alt="Edit"
                                     style="height:30px;width:30px;">
                            </a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="15">
                            <p class="text-danger text-center">No data found !</p>
                        </td>

                    </tr>
                @endforelse
                <tr>
                    <td colspan="12">
                        {{ $departments->links() }}
                        <span class="pull-right">
                            Records {{ $departments->firstItem() }} - {{ $departments->lastItem() }}
                            of {{ $departments->total() }}
                            (for page {{ $departments->currentPage() }} )
                        </span>
                    </td>
                </tr>

                </tbody>

            </table>

        </div>


        {!! Form::close() !!}


    </div>
    <!-- /highlighting rows and columns -->


@endsection

@section('scripts')



@endsection