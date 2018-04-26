@extends('admin::layout')
@section('title') List of User @endsection
@section('breadcrumb')
    <li class="active"> User</li>  @endsection

@section('scripts')
    <script type="text/javascript"
            src="{{asset('app/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/pages/datatables_advanced.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/pages/datatables_data_sources.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/pages/datatables_extension_buttons_init.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


@endsection

@section('content')
    <!-- HTML sourced data -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">User List</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li>
                        <a href="{{route('user.create')}}">
                            <button type="button" class="btn btn-xs btn-primary" id="add-step"><i
                                        class="icon-plus22"></i></button>
                        </a>
                    </li>
                    <li>
                        <button class="btn btn-xs btn-success" id="step-back" action="action"
                                onclick="window.history.go(-1); return false;" type="reset"><i
                                    class="icon-arrow-left16"></i>
                        </button>
                    </li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>


        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>S.N</th>

                <th>Profile Pic</th>
                <th>Username</th>
                <th>Name</th>

                <th>Email</th>
                <th>Phone No</th>
                <th>Status</th>

                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key=>$user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>

                        @if(!empty(asset("$user->profile_image") && $user->profile_image != null  ))
                            <a href="{{ asset("app/userProfile/$user->profile_image")}}" class="highslide shadow-z-4"
                               onclick="return hs.expand(this)">
                                <img src="{{ asset("app/userProfile/$user->profile_image")}}" width="85"
                                     alt="" class="img-thumbnail"/>
                            </a>
                        @else

                            <a href="{{ asset('asset/user.png') }}" class="highslide shadow-z-4"
                               onclick="return hs.expand(this)">
                                <img src="{{ asset('asset/user.png') }}" width="85"
                                     alt="" class="img-thumbnail"/>
                            </a>
                        @endif
                    </td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}}</td>

                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        @if ($user->status == 1)
                            <a href="#" class="btnStatus" data-status="{{ $user->status }}"
                               data-id="{{ $user->id}}" data-url="{!! route('user.status') !!}">
                                <i class="fa fa-toggle-on fa-2x text-success-800">
                                </i>
                            </a>
                        @else
                            <a href="#" class="btnStatus" data-status="{{$user->status }}"
                               data-id="{{ $user->id }}" data-url="{!! route('user.status') !!}">
                                <i class="fa fa-toggle-off fa-2x text-danger-800">
                                </i>
                            </a>
                        @endif
                    </td>


                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('user.edit',['id'=>$user->id])}}"><i
                                                    class="icon-pencil5"></i> Edit</a></li>
                                    <li onclick="confirmAndSubmit('{!! route("user.destroy",['id'=>$user->id]) !!}')">
                                        <a href="#">
                                            <i class="icon-trash"></i>
                                            Delete</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /HTML sourced data -->
@stop
