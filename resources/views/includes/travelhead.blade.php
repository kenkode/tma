<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TMAPP</title>

    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/jquery.dataTables.1.10.11.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('/assets/css/jquery.datetimepicker.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('/assets/datepicker/css/bootstrap-datepicker.css')}}"/>
    <!-- Toastr style -->
    <link href="{{url('/assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{url('/assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{url('/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/style.css')}}" rel="stylesheet">

    <script src="{{url('/assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/assets/js/price_format.js')}}"></script>
    <script src="{{url('/assets/js/validator.js')}}"></script>

    <script type="text/javascript">
        $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });
    </script>
    

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

body{
    height: auto !important;
}
</style>

 <style type="text/css">

   .right-inner-addon {
    position: relative;
   }
   .right-inner-addon input {
    padding-right: 0px;    
   }
   .right-inner-addon input:hover {
    cursor: pointer;   
   }
   .right-inner-addon i {
    position: absolute;
    right: 0px !important;
    padding: 10px 12px;
    pointer-events: none;

   }
  
   </style>

<style type="text/css">
    #users{
        font-size: 12px !important;
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
                                <li><a href="{{url('organizations')}}">Organization</a></li>
                                <li><a href="{{url('mails')}}">Mail Settings</a></li>
                                <li><a href="{{url('profile')}}">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            TMA
                        </div>
                    </li>

                    @if(collect(request()->segments())->last() == '')
                    <li class="active">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    @else
                    <li>
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    @endif


                    @if(Auth::user()->type == 'Events')
                    @if(collect(request()->segments())->last() == 'events')
                    <li class="active">
                        <a href="{{url('events')}}"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span></a>
                    </li>
                    @else
                    <li>
                        <a href="{{url('events')}}"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span></a>
                    </li>
                    @endif
                    @endif

                    @if(Auth::user()->type == 'Hotel')
                    @if(collect(request()->segments())->last() == 'hotelbranches' || collect(request()->segments())->last() == 'pricing' || collect(request()->segments())->last() == 'hotelrooms' || collect(request()->segments())->last() == 'roomtype' || collect(request()->segments())->last() == 'deposits')
                    <li class="active">
                        <a href="#"><i class="fa fa-building nav_icon"></i> <span class="nav-label">Hotel Management</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="{{url('hotelbranches')}}">Branches</a></li>
                            <!-- <li ><a href="{{url('hotelcalendar')}}">Calendar</a></li> -->
                            <li ><a href="{{url('hotelrooms')}}">Rooms</a></li>
                            <li ><a href="{{url('roomtype')}}">Room Type</a></li>
                            <li ><a href="{{url('pricing')}}">Pricing Plan</a></li>
                            <!-- <li ><a href="{{url('deposits')}}">Advance Payments</a></li> -->
                        </ul>
                    </li>          
                    @else
                    <li >
                        <a href="#"><i class="fa fa-building nav_icon"></i> <span class="nav-label">Hotel Management</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="{{url('hotelbranches')}}">Branches</a></li>
                            <!-- <li ><a href="{{url('hotelcalendar')}}">Calendar</a></li> -->
                            <li ><a href="{{url('hotelrooms')}}">Rooms</a></li>
                            <li ><a href="{{url('roomtype')}}">Room Type</a></li> 
                            <li ><a href="{{url('pricing')}}">Pricing Plan</a></li>
                            <!-- <li ><a href="{{url('deposits')}}">Advance Payments</a></li> -->
                        </ul>
                    </li>          
                    @endif
                    @endif

                    @if(collect(request()->segments())->last() == 'vehiclenames' || collect(request()->segments())->last() == 'vehicles' || collect(request()->segments())->last() == 'activate' || collect(request()->segments())->last() == 'destinations' || collect(request()->segments())->last() == 'paymentoptions' || collect(request()->segments())->last() == 'schedules')

                    <li class="active">
                    @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                    <a href="#"><i class="fa fa-car nav_icon"></i> <span class="nav-label">Vehicle Management</span> <span class="fa arrow"></span></a>
                    @elseif(Auth::user()->type == 'SGR')
                    <a href="#"><i class="fa fa-train nav_icon"></i> <span class="nav-label">Train Management</span> <span class="fa arrow"></span></a>
                    @elseif(Auth::user()->type == 'Airline')
                    <a href="#"><i class="fa fa-plane nav_icon"></i> <span class="nav-label">Airplane Management</span> <span class="fa arrow"></span></a>
                    @endif
                      
                        <ul class="nav nav-second-level">
                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                            <li ><a href="{{url('vehiclenames')}}">Vehicle Names</a></li>
                            @elseif(Auth::user()->type == 'SGR')
                            <li ><a href="{{url('vehiclenames')}}">Train Names</a></li>
                            @elseif(Auth::user()->type == 'Airline')
                            <li ><a href="{{url('vehiclenames')}}">Airplane Names</a></li>
                            @endif

                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                            <li ><a href="{{url('vehicles')}}">Vehicles</a></li>
                            @elseif(Auth::user()->type == 'SGR')
                            <li ><a href="{{url('vehicles')}}">Trains</a></li>
                            @elseif(Auth::user()->type == 'Airline')
                            <li ><a href="{{url('vehicles')}}">Airplanes</a></li>
                            @endif

                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                            <li ><a href="{{url('vehicles/activate')}}">Activate Vehicles</a></li>
                            @elseif(Auth::user()->type == 'SGR')
                            <li ><a href="{{url('vehicles/activate')}}">Activate Train</a></li>
                            @elseif(Auth::user()->type == 'Airline')
                            <li ><a href="{{url('vehicles/activate')}}">Activate Airplane</a></li>
                            @endif
                            
                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'SGR' || Auth::user()->type == 'Airline')
                            <li ><a href="{{url('seatassignments')}}">Seat Assignments</a></li>
                            @endif

                            @if(Auth::user()->type != 'Events')
                            <li ><a href="{{url('destinations')}}">Destinations</a></li>
                            <li ><a href="{{url('paymentoptions')}}">Payment Options</a></li>
                            @if(Auth::user()->type != 'Taxi')
                            <li ><a href="{{url('schedules')}}">Schedules</a></li>
                            @endif
                            @endif
                        </ul>
                    </li>

                    @else 
                    <li>
                    @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                    <a href="#"><i class="fa fa-car nav_icon"></i> <span class="nav-label">Vehicle Management</span> <span class="fa arrow"></span></a>
                    @elseif(Auth::user()->type == 'SGR')
                    <a href="#"><i class="fa fa-train nav_icon"></i> <span class="nav-label">Train Management</span> <span class="fa arrow"></span></a>
                    @elseif(Auth::user()->type == 'Airline')
                    <a href="#"><i class="fa fa-plane nav_icon"></i> <span class="nav-label">Airplane Management</span> <span class="fa arrow"></span></a>
                    @endif

                        <ul class="nav nav-second-level">
                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                            <li ><a href="{{url('vehiclenames')}}">Vehicle Names</a></li>
                            @elseif(Auth::user()->type == 'SGR')
                            <li ><a href="{{url('vehiclenames')}}">Train Names</a></li>
                            @elseif(Auth::user()->type == 'Airline')
                            <li ><a href="{{url('vehiclenames')}}">Airplane Names</a></li>
                            @endif

                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                            <li ><a href="{{url('vehicles')}}">Vehicles</a></li>
                            @elseif(Auth::user()->type == 'SGR')
                            <li ><a href="{{url('vehicles')}}">Trains</a></li>
                            @elseif(Auth::user()->type == 'Airline')
                            <li ><a href="{{url('vehicles')}}">Airplanes</a></li>
                            @endif

                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
                            <li ><a href="{{url('vehicles/activate')}}">Activate Vehicles</a></li>
                            @elseif(Auth::user()->type == 'SGR')
                            <li ><a href="{{url('vehicles/activate')}}">Activate Train</a></li>
                            @elseif(Auth::user()->type == 'Airline')
                            <li ><a href="{{url('vehicles/activate')}}">Activate Airplane</a></li>
                            @endif

                            @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'SGR' || Auth::user()->type == 'Airline')
                            <li ><a href="{{url('seatassignments')}}">Seat Assignments</a></li>
                            @endif
                            
                            @if(Auth::user()->type != 'Events')
                            <li ><a href="{{url('destinations')}}">Destinations</a></li>
                            <li ><a href="{{url('paymentoptions')}}">Payment Options</a></li>
                            @if(Auth::user()->type != 'Taxi')
                            <li ><a href="{{url('schedules')}}">Schedules</a></li>
                            @endif
                            @endif
                        </ul>
                    </li>

                    @endif

                    @if(collect(request()->segments())->last() == 'bookings' || collect(request()->segments())->last() == 'customers' || collect(request()->segments())->last() == 'payments')
                    
                    <li class="active">
                        <a href="#"><i class="fa fa-book nav_icon"></i> <span class="nav-label">Bookings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('bookings')}}">Bookings</a></li>
                            <li><a href="{{url('customers')}}">Customers</a></li>
                            <li><a href="{{url('payments')}}">Payments</a></li>
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href="#"><i class="fa fa-book nav_icon"></i> <span class="nav-label">Bookings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('bookings')}}">Bookings</a></li>
                            <li><a href="{{url('customers')}}">Customers</a></li>
                            <li><a href="{{url('payments')}}">Payments</a></li>\
                        </ul>
                    </li>
                    @endif

                    @if(collect(request()->segments())->last() == 'organizations' || collect(request()->segments())->last() == 'currencies' || collect(request()->segments())->last() == 'mails' || collect(request()->segments())->last() == 'profile')
                    <li class="active">
                        <a href="#"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('organizations')}}">Organization</a></li>
                            <!-- <li><a href="{{url('currencies')}}">Currency</a></li> -->
                            <li><a href="{{url('mails')}}">Mail Settings</a></li>
                            <li><a href="{{url('profile')}}">Profile</a></li>
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href="#"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('organizations')}}">Organization</a></li>
                            <!-- <li><a href="{{url('currencies')}}">Currency</a></li> -->
                            <li><a href="{{url('mails')}}">Mail Settings</a></li>
                            <li><a href="{{url('profile')}}">Profile</a></li>
                        </ul>
                    </li>
                    @endif
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
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!-- <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> -->
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome {{Auth::user()->name}}</span>
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
