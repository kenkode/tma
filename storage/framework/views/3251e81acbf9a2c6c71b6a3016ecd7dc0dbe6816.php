<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TMAPP</title>

    <link href="<?php echo e(url('/assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('/assets/css/jquery.dataTables.1.10.11.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('/assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/assets/css/jquery.datetimepicker.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/assets/datepicker/css/bootstrap-datepicker.css')); ?>"/>
    <!-- Toastr style -->
    <link href="<?php echo e(url('/assets/css/plugins/toastr/toastr.min.css')); ?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo e(url('/assets/js/plugins/gritter/jquery.gritter.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(url('/assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('/assets/css/style.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(url('/assets/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/price_format.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/validator.js')); ?>"></script>

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
                            <img alt="image" width="70" class="img-circle" src="<?php echo e(url('/assets/img/default_photo.png')); ?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo e(Auth::user()->name); ?></strong>
                             </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo e(url('organizations')); ?>">Organization</a></li>
                                <li><a href="<?php echo e(url('mails')); ?>">Mail Settings</a></li>
                                <li><a href="<?php echo e(url('profile')); ?>">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            TMA
                        </div>
                    </li>

                    <?php if(collect(request()->segments())->last() == ''): ?>
                    <li class="active">
                        <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <?php endif; ?>


                    <?php if(Auth::user()->type == 'Events'): ?>
                    <?php if(collect(request()->segments())->last() == 'events'): ?>
                    <li class="active">
                        <a href="<?php echo e(url('events')); ?>"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo e(url('events')); ?>"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span></a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(Auth::user()->type == 'Hotel'): ?>
                    <?php if(collect(request()->segments())->last() == 'hotelbranches' || collect(request()->segments())->last() == 'pricing' || collect(request()->segments())->last() == 'hotelrooms' || collect(request()->segments())->last() == 'roomtype' || collect(request()->segments())->last() == 'deposits'): ?>
                    <li class="active">
                        <a href="#"><i class="fa fa-building nav_icon"></i> <span class="nav-label">Hotel Management</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="<?php echo e(url('hotelbranches')); ?>">Branches</a></li>
                            <!-- <li ><a href="<?php echo e(url('hotelcalendar')); ?>">Calendar</a></li> -->
                            <li ><a href="<?php echo e(url('hotelrooms')); ?>">Rooms</a></li>
                            <li ><a href="<?php echo e(url('roomtype')); ?>">Room Type</a></li>
                            <li ><a href="<?php echo e(url('pricing')); ?>">Pricing Plan</a></li>
                            <!-- <li ><a href="<?php echo e(url('deposits')); ?>">Advance Payments</a></li> -->
                        </ul>
                    </li>          
                    <?php else: ?>
                    <li >
                        <a href="#"><i class="fa fa-building nav_icon"></i> <span class="nav-label">Hotel Management</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="<?php echo e(url('hotelbranches')); ?>">Branches</a></li>
                            <!-- <li ><a href="<?php echo e(url('hotelcalendar')); ?>">Calendar</a></li> -->
                            <li ><a href="<?php echo e(url('hotelrooms')); ?>">Rooms</a></li>
                            <li ><a href="<?php echo e(url('roomtype')); ?>">Room Type</a></li> 
                            <li ><a href="<?php echo e(url('pricing')); ?>">Pricing Plan</a></li>
                            <!-- <li ><a href="<?php echo e(url('deposits')); ?>">Advance Payments</a></li> -->
                        </ul>
                    </li>          
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(collect(request()->segments())->last() == 'vehiclenames' || collect(request()->segments())->last() == 'vehicles' || collect(request()->segments())->last() == 'activate' || collect(request()->segments())->last() == 'destinations' || collect(request()->segments())->last() == 'paymentoptions' || collect(request()->segments())->last() == 'schedules'): ?>

                    <li class="active">
                    <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                    <a href="#"><i class="fa fa-car nav_icon"></i> <span class="nav-label">Vehicle Management</span> <span class="fa arrow"></span></a>
                    <?php elseif(Auth::user()->type == 'SGR'): ?>
                    <a href="#"><i class="fa fa-train nav_icon"></i> <span class="nav-label">Train Management</span> <span class="fa arrow"></span></a>
                    <?php elseif(Auth::user()->type == 'Airline'): ?>
                    <a href="#"><i class="fa fa-plane nav_icon"></i> <span class="nav-label">Airplane Management</span> <span class="fa arrow"></span></a>
                    <?php endif; ?>
                      
                        <ul class="nav nav-second-level">
                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('vehiclenames')); ?>">Vehicle Names</a></li>
                            <?php elseif(Auth::user()->type == 'SGR'): ?>
                            <li ><a href="<?php echo e(url('vehiclenames')); ?>">Train Names</a></li>
                            <?php elseif(Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('vehiclenames')); ?>">Airplane Names</a></li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('vehicles')); ?>">Vehicles</a></li>
                            <?php elseif(Auth::user()->type == 'SGR'): ?>
                            <li ><a href="<?php echo e(url('vehicles')); ?>">Trains</a></li>
                            <?php elseif(Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('vehicles')); ?>">Airplanes</a></li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('vehicles/activate')); ?>">Activate Vehicles</a></li>
                            <?php elseif(Auth::user()->type == 'SGR'): ?>
                            <li ><a href="<?php echo e(url('vehicles/activate')); ?>">Activate Train</a></li>
                            <?php elseif(Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('vehicles/activate')); ?>">Activate Airplane</a></li>
                            <?php endif; ?>
                            
                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'SGR' || Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('seatassignments')); ?>">Seat Assignments</a></li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type != 'Events'): ?>
                            <li ><a href="<?php echo e(url('destinations')); ?>">Destinations</a></li>
                            <li ><a href="<?php echo e(url('paymentoptions')); ?>">Payment Options</a></li>
                            <?php if(Auth::user()->type != 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('schedules')); ?>">Schedules</a></li>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <?php else: ?> 
                    <li>
                    <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                    <a href="#"><i class="fa fa-car nav_icon"></i> <span class="nav-label">Vehicle Management</span> <span class="fa arrow"></span></a>
                    <?php elseif(Auth::user()->type == 'SGR'): ?>
                    <a href="#"><i class="fa fa-train nav_icon"></i> <span class="nav-label">Train Management</span> <span class="fa arrow"></span></a>
                    <?php elseif(Auth::user()->type == 'Airline'): ?>
                    <a href="#"><i class="fa fa-plane nav_icon"></i> <span class="nav-label">Airplane Management</span> <span class="fa arrow"></span></a>
                    <?php endif; ?>

                        <ul class="nav nav-second-level">
                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('vehiclenames')); ?>">Vehicle Names</a></li>
                            <?php elseif(Auth::user()->type == 'SGR'): ?>
                            <li ><a href="<?php echo e(url('vehiclenames')); ?>">Train Names</a></li>
                            <?php elseif(Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('vehiclenames')); ?>">Airplane Names</a></li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('vehicles')); ?>">Vehicles</a></li>
                            <?php elseif(Auth::user()->type == 'SGR'): ?>
                            <li ><a href="<?php echo e(url('vehicles')); ?>">Trains</a></li>
                            <?php elseif(Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('vehicles')); ?>">Airplanes</a></li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('vehicles/activate')); ?>">Activate Vehicles</a></li>
                            <?php elseif(Auth::user()->type == 'SGR'): ?>
                            <li ><a href="<?php echo e(url('vehicles/activate')); ?>">Activate Train</a></li>
                            <?php elseif(Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('vehicles/activate')); ?>">Activate Airplane</a></li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'SGR' || Auth::user()->type == 'Airline'): ?>
                            <li ><a href="<?php echo e(url('seatassignments')); ?>">Seat Assignments</a></li>
                            <?php endif; ?>
                            
                            <?php if(Auth::user()->type != 'Events'): ?>
                            <li ><a href="<?php echo e(url('destinations')); ?>">Destinations</a></li>
                            <li ><a href="<?php echo e(url('paymentoptions')); ?>">Payment Options</a></li>
                            <?php if(Auth::user()->type != 'Taxi'): ?>
                            <li ><a href="<?php echo e(url('schedules')); ?>">Schedules</a></li>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <?php endif; ?>

                    <?php if(collect(request()->segments())->last() == 'bookings' || collect(request()->segments())->last() == 'customers' || collect(request()->segments())->last() == 'payments'): ?>
                    
                    <li class="active">
                        <a href="#"><i class="fa fa-book nav_icon"></i> <span class="nav-label">Bookings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo e(url('bookings')); ?>">Bookings</a></li>
                            <li><a href="<?php echo e(url('customers')); ?>">Customers</a></li>
                            <li><a href="<?php echo e(url('payments')); ?>">Payments</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="#"><i class="fa fa-book nav_icon"></i> <span class="nav-label">Bookings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo e(url('bookings')); ?>">Bookings</a></li>
                            <li><a href="<?php echo e(url('customers')); ?>">Customers</a></li>
                            <li><a href="<?php echo e(url('payments')); ?>">Payments</a></li>\
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if(collect(request()->segments())->last() == 'organizations' || collect(request()->segments())->last() == 'currencies' || collect(request()->segments())->last() == 'mails' || collect(request()->segments())->last() == 'profile'): ?>
                    <li class="active">
                        <a href="#"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo e(url('organizations')); ?>">Organization</a></li>
                            <!-- <li><a href="<?php echo e(url('currencies')); ?>">Currency</a></li> -->
                            <li><a href="<?php echo e(url('mails')); ?>">Mail Settings</a></li>
                            <li><a href="<?php echo e(url('profile')); ?>">Profile</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="#"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo e(url('organizations')); ?>">Organization</a></li>
                            <!-- <li><a href="<?php echo e(url('currencies')); ?>">Currency</a></li> -->
                            <li><a href="<?php echo e(url('mails')); ?>">Mail Settings</a></li>
                            <li><a href="<?php echo e(url('profile')); ?>">Profile</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                     <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i>
                                            Log out
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

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
                    <span class="m-r-sm text-muted welcome-message">Welcome <?php echo e(Auth::user()->name); ?></span>
                </li>
                
            


                <li>
                    <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i>
                                            Log out
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                   
                </li>
            </ul>

        </nav>
        </div>
