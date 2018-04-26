  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>@yield('title') </title>

  <!-- Bootstrap -->
  <link href="{{ URL::asset('/backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ URL::asset('/backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom Theme Style -->
  <link href="{{ URL::asset('/backend/build/css/custom.min.css') }}" rel="stylesheet">
  <!-- Datatables -->
  <link rel="stylesheet" href="{{ URL::asset('/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
    <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/lib/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css">

    {{--Checkbox Css from https://github.com/lokesh-coder/pretty-checkbox--}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
      <!--HighSlide-->
      <link href="{{ asset('assets/lib/highslide/highslide.css')}}" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css">
      <!-- /global stylesheets -->
      @yield('style')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container" >