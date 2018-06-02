
@extends('frontLayout.front')
@section('title')
    Career
@stop

@section('style')
    <style>
        .im{
            background:  url("{{asset('images/career-banner.jpg')}}")  no-repeat center  ;
            lin
        }
    </style>

@stop
@section('content')
    <div class=" im" style="height: 200px;width: 100%;margin: 0;padding: 0;" >

    </div>
    <hr>

    <div class="container">
        <h3>Vacancy</h3>

        <table class="table table-hover table-responsive-md">

            <!--Table head-->
            <thead>
            <tr style="border-bottom-style: solid">
                <th>SN</th>
                <th class="th-lg">Job Title </th>
                <th class="th-lg">Type</th>
                <th class="th-lg">Deadline</th>
                <th></th>
            </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >Apply</button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Apply</button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td>Closed</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td>Closed</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td>Closed</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td>Closed</td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td>Closed</td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>PHP Laravel Programmer</td>
                <td>Regular / Permanent</td>
                <td>31-Mar-2018 </td>
                <td>Closed</td>
            </tr>

            </tbody>
            <!--Table body-->

        </table>
        <!--Table-->



    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send your CV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Name:*</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Email:*</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Position:*</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Phone*:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Attach your CV* :</label>
                            <input class="form-control" id="message-text" type="file">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>







@endsection

@section('scripts')


@endsection