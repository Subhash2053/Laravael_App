@extends('site::layout')
@section('wrapper')
    <div class="container">
        <div class="col-12">
            <div class="login">
                <div class="box">
                    <form action="">
                        <div class="title">Don't have an account? Sign up now</div>
                        <div class="formgroup">
                            <div class="field"><input type="text" name="" value="" placeholder="Full Name"></div>
                            <div class="field"><input type="email" name="" value="" placeholder="Email"></div>
                            <div class="field"><input type="tel" name="" value="" placeholder="Mobile"></div>
                            <div class="field"><input type="password" name="" value="" placeholder="Type your password">
                            </div>
                            <div class="field"><input type="password" name="" value=""
                                                      placeholder="Re-type your password"></div>
                            <div class="field">
                                <button type="submit" class="full">Sign up now</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
