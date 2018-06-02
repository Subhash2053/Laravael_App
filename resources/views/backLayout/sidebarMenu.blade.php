
<div class="left_col scroll-view">
  <div class="navbar nav_title pull-left" style="border: 0;padding-left: 0px!important;">
    <a href="{{url('dashboard')}}" class="site_title"><i class="fa fa-dashboard"></i> <span>HRMS</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile">
    <div class="profile_pic">
      <img src="{{ URL::asset('/images/logo.png') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{Auth::user()->name }}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">



         <li><a><i class="icon-cabinet"></i>&nbsp; Department <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{URL::to('dashboard/department/create')}}">Add New</a></li>
            <li><a href="{{URL::to('dashboard/department')}}">View All</a></li>

          </ul>
        </li>

        <li><a><i class="icon-users4"></i>&nbsp; Employee <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{URL::to('dashboard/employee/create')}}">Add New</a></li>
            <li><a href="{{URL::to('dashboard/employee')}}">View All</a></li>

          </ul>
        </li>
        <li><a><i class="icon-user-plus"></i>&nbsp; Employee Type<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="form.html">Add New</a></li>
            <li><a href="form_advanced.html">View All</a></li>

          </ul>
        </li>
        <li><a><i class="icon-newspaper2"></i>&nbsp; News & Notices<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="form.html">Add New</a></li>
            <li><a href="form_advanced.html">View All</a></li>

          </ul>
        </li>
        <li><a><i class="icon-eye"></i>&nbsp; Vacancy<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{URL::to('dashboard/vacancy/create')}}">Add New</a></li>
            <li><a href="{{URL::to('dashboard/vacancy')}}">View All</a></li>
            <li><a href="form_advanced.html">Manage</a></li>

          </ul>
        </li>


      </ul>
    </div>
    <div class="menu_section">
      <h3>Live On</h3>
      <ul class="nav side-menu">

        <li>
          <a><i class="icon-info3"></i>&nbsp;Company Information </a>

        </li>

        <li><a><i class="fa fa-users"></i>Users <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="form.html">All users</a></li>
            <li><a href="form.html">New user</a></li>
          </ul>
        </li>

        <li><a><i class="fa fa-cog"></i> Roles <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="form.html">All Roles</a></li>
            <li><a href="form.html">New Role</a></li>
          </ul>
        </li>


        <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
              <li><a href="#level1_1">Level One</a>
              <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="level2.html">Level Two</a>
                  </li>
                  <li><a href="#level2_1">Level Two</a>
                  </li>
                  <li><a href="#level2_2">Level Two</a>
                  </li>
                </ul>
              </li>
              <li><a href="#level1_2">Level One</a>
              </li>
          </ul>
        </li>                  
        <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
      </ul>
    </div>

  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
</div>
