@extends('admin::layout')
@section('title')  Permission Denied!! @endsection


@section('content')

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Error title -->
                <div class="text-center content-group">
                    <h1 class="">Permission Denied !!</h1>
                    <h5>Oops, an error has occurred. Not allowed!</h5>
                </div>
                <!-- /error title -->


                <!-- Error content -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">


                            <div class="text-center">
                                <a href="#" class="btn bg-pink-400" onclick="window.history.go(-1); return false;"><i class="icon-circle-left2 position-left"></i> Back</a>
                            </div>


                    </div>
                </div>
                <!-- /error wrapper -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

@endsection
