
@extends('backLayout.app')
@section('title')
    Vacancy| Index
@stop

@section('style')

@stop
@section('content')


    <!-- Highlighting rows and columns -->
    <div class="panel panel-flat border-top-info " >
        <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Vacancy <span class="badge badge-info">{{ count($vacancies) }}</span></li>
            </ul>
        </div>
        <div class="panel-heading">
            <div class="col-xs-5">
                <form action="{{ URL::to('dashboard/vacancy/index') }}" method="GET">
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
                    <a href="{{URL::to('dashboard/vacancy/create')}}">
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
        {!! Form::open(['route' => 'vacancy.destroy','method'=>'DELETE','id'=>'formDelete']) !!}


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <a href="{{ URL::to('dashboard/vacancy/index') }}">
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
                    <th>Image</th>
                    <th>
                        <a href="{{ URL::to('dashboard/vacancy/index') }}">
                            Name
                            <span><i class="fa fa-sort text-success"></i></span>
                        </a>
                    </th>

                    <th>Status</th>
                    <th>Department</th>
                    <th>
                        <a href="{{ URL::to('dashboard/vacancy/index') }}"
                           class="grey">
                            Created Date
                            <span><i class="fa fa-sort text-success"></i></span>
                        </a>
                    </th>
                    <th>View</th>
                    <th class="text-center">Edit</th>
                </tr>
                </thead>
                <tbody>
                @forelse($vacancies as $vacancy)
                    <tr>
                        <td>{{$vacancy->id}}</td>
                        <td>
                            <div class="pretty p-default">
                                {!! Form::checkbox('toDelete[]',$vacancy->id, false,['class'=>'checkItem']) !!}
                                <div class="state">
                                    <label></label>
                                </div>
                            </div>
                        </td>
                        <td>

                            @if($vacancy->profile_image)
                                <a href="{{ $vacancy->profile_image }}" class="highslide shadow-z-4"
                                   onclick="return hs.expand(this)">
                                    <img src="{{$vacancy->profile_image}}" width="85"
                                         alt="{{ $vacancy->name }}" class="img-thumbnail"/>
                                </a>
                            @else
                                <a href="{{ asset('asset/lib/no_avatar.jpg') }}" class="highslide shadow-z-4"
                                   onclick="return hs.expand(this)">
                                    <img src="{{ asset('asset/lib/no_avatar.jpg') }}" width="85"
                                         alt="{{ $vacancy->name }}" class="img-thumbnail"/>
                                </a>
                            @endif
                        </td>
                        <td>{{ucwords($vacancy->name)}}</td>
                        <td>
                            @if ($vacancy->status == 1)
                                <a href="#" class="btnStatus" data-status="{{ $vacancy->status }}"
                                   data-id="{{ $vacancy->id}}" data-url="{!! route('vacancy.status') !!}">
                                    <i class="fa fa-toggle-on fa-2x text-success-800">
                                    </i>
                                </a>
                            @else
                                <a href="#" class="btnStatus" data-status="{{$vacancy->status }}"
                                   data-id="{{ $vacancy->id }}" data-url="{!! route('vacancy.status') !!}">
                                    <i class="fa fa-toggle-off fa-2x text-danger-800">
                                    </i>
                                </a>
                            @endif

                        </td>
                        <td>{{$vacancy->departments->title}}</td>
                        <td>{{$vacancy->created_at}}</td>
                        <td class="text-center">
                            <a href="{{route('vacancy.show',$vacancy->id)}}">
                                <img src="{{ asset('assets/images/form-icon/view.png') }}" alt="Edit"
                                     style="height:30px;width:30px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('vacancy.edit',$vacancy->id)}}">
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
                        {{ $vacancies->links() }}
                        <span class="pull-right">
                            Records {{ $vacancies->firstItem() }} - {{ $vacancies->lastItem() }}
                            of {{ $vacancies->total() }}
                            (for page {{ $vacancies->currentPage() }} )
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