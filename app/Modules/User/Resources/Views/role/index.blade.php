@extends('admin::layout')
@section('title') List of Role @endsection
@section('breadcrumb')
    <li class="active"> Role</li>  @endsection

@section('page_wise_js')
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
            <h5 class="panel-title">Role List</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li>
                        <a href="{{route('role.create')}}">
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
                <th>Name</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Created</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $key=>$role)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$role->name}}</td>

                    <td>{{$role->sort_order}}</td>
                    <td>
                        @if ($role->status == 1)
                            <a href="#" class="btnStatus" data-status="{{ $role->status }}"
                               data-id="{{ $role->id}}" data-url="{!! route('role.status') !!}">
                                <i class="fa fa-toggle-on fa-2x text-success-800">
                                </i>
                            </a>
                        @else
                            <a href="#" class="btnStatus" data-status="{{$role->status }}"
                               data-id="{{ $role->id }}" data-url="{!! route('role.status') !!}">
                                <i class="fa fa-toggle-off fa-2x text-danger-800">
                                </i>
                            </a>
                        @endif
                    </td>
                    <td>{{$role->created_at}}</td>

                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('role.edit',['id'=>$role->id])}}"><i
                                                    class="icon-pencil5"></i> Edit</a></li>

                                    <li onclick="confirmAndSubmit('{!! route("role.destroy",['id'=>$role->id]) !!}')">
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
