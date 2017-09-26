<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMAPP</title>
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/jquery.dataTables.1.10.11.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{url('/assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <!-- Data Tables -->
    <link href="{{URL::to('/assets/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/css/plugins/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/css/plugins/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{url('/assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/style.css')}}" rel="stylesheet">
    <style type="text/css">
        #loading {
           width: 100%;
           height: 100%;
           top: 0;
           left: 0;
           position: fixed;
           display: block;
           opacity: 0.7;
           background-color: #fff;
           z-index: 99;
           text-align: center;
        }

        #loading-image {
          position: absolute;
          top: 100px;
          left: 240px;
          z-index: 100;
        }   
        .navbar-static-top {
            background-color:#fff59d !important;
        }
</style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" width="70" class="img-circle" src="{{url('/assets/img/default_photo.png')}}" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                             </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            TMA
                        </div>
                    </li>

                    <li class="active">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>

                    <li >
                        <a href="index.html"><i class="fa fa-truck nav_icon"></i> <span class="nav-label">Hotel Management</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="{{url('hotelbranches')}}">Branches</a></li>
                            <li ><a href="{{url('hotelcalendar')}}">Calendar</a></li>
                            <li ><a href="{{url('hotelrooms')}}">Rooms</a></li>
                            <!-- <li ><a href="{{url('hotelreservations')}}">Reservations</a></li> -->
                        </ul>
                    </li>                                
                    <li>
                        <a href="mailbox.html"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('organizations')}}">Organization</a></li>
                            <li><a href="{{url('currencies')}}">Currency</a></li>
                            <li><a href="{{url('mails')}}">Mail Settings</a></li>
                            <li><a href="{{url('profile')}}">Profile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i>
                                    Log out
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>      
                    </li>
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="{{ url('/search_results') }}">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">
                    Welcome {{Auth::user()->name}}</span>
                </li>                                                
                <li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i>
                        Log out
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>                   
                </li>
            </ul>
    </nav>
</div>
