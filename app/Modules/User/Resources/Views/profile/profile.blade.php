@extends('main::layout')

@section('title') Your Profile @endsection
@section('breadcrumb')
    <li class="active"> Your Profile</li>
@endsection

@section('content')
    <!-- Highlighting rows and columns -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">User Information</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                        <li>
                            <a href="{{route('user.edit',$user->id)}}">
                                <button type="button" class="btn btn-xs btn-primary" id="add-step"><i
                                            class="icon-plus22"></i></button>
                            </a>
                        </li>
                </ul>

            </div>
        </div>


        <div class="panel-body">
            @include('flash::message')
            <table class="table">
                <tr>
                    <td>Full Name</td>
                    <td>{{$user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user->email }}</td>
                </tr>
                <tr>
                    <td>Your Image</td>
                    <td>

                        @if($user->profile_image)
                            <a href="{{ $user->profile_image }}" class="highslide shadow-z-4"
                               onclick="return hs.expand(this)">
                                <img src="{{$user->profile_image}}" width="85"
                                     alt="{{ $user->name }}" class="img-thumbnail"/>
                            </a>
                        @else

                            <a href="{{ asset('asset/lib/no_avatar.jpg') }}" class="highslide shadow-z-4"
                               onclick="return hs.expand(this)">
                                <img src="{{ asset('asset/lib/no_avatar.jpg') }}" width="85"
                                     alt="{{ $user->title }}" class="img-thumbnail"/>
                            </a>
                        @endif
                    </td>
                </tr>

            </table>

        </div>


    </div>
    <!-- /highlighting rows and columns -->
@endsection