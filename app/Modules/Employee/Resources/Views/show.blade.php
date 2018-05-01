@extends('main::layout')
@section('title')  Detail @endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb-line head-title"><a class="breadcrumb-elements-toggle"><i
                            class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li><a href="{{ route('employee.index') }}"><i class="icon-users4 position-left"></i> Employee
                            Detail</a>
                    </li>
                    <li class="active">Employee Detail</li>
                </ul>
            </div>
            <!-- Basic layout-->
            <div class="panel panel-body">
                <div class="panel-body">
                    @include('flash::message')
                    <div class="text-right">
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{route('employee.index')}}"> <i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>

                    <table class="table">
                        <tr>

                            <td><strong>Full Name:&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                                {{$employee->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Profile Image:&nbsp; &nbsp; &nbsp; &nbsp;</strong>

                                @if($employee->profile_image)
                                    <a href="{{ $employee->profile_image }}" class="highslide shadow-z-4"
                                       onclick="return hs.expand(this)">
                                        <img src="{{$employee->profile_image}}" width="85"
                                             alt="{{ $employee->name }}" class="img-thumbnail"/>
                                    </a>
                                @else

                                    <a href="{{ asset('asset/lib/no_avatar.jpg') }}" class="highslide shadow-z-4"
                                       onclick="return hs.expand(this)">
                                        <img src="{{ asset('asset/lib/no_avatar.jpg') }}" width="85"
                                             alt="{{ $employee->name }}" class="img-thumbnail"/>
                                    </a>
                                @endif
                            </td>
                        <tr>
                            <td>
                                <strong>Department:&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                                {{$employee->departments->title}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Designation:&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                                {{$employee->designation }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Specialization:&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                                {{$employee->specialization }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Education:&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                                {{$employee->degree }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Sort_order:&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                                {{$employee->sort_order }}
                            </td>
                        </tr>
                        </tr>

                    </table>
                    <div class="text-right">
                        <a class="btn btn-rounded btn-danger btn-raised active" href="{{route('employee.index')}}"> <i
                                    class="glyphicon glyphicon-arrow-left"></i> Back</a>
                    </div>


                </div>

            </div>
            <!-- /basic layout -->
        </div>
    </div>
@endsection

