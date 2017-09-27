<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">

table {
  max-width: 100%;
  background-color: transparent;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  margin-bottom: 2px;
}
hr {
  
  border: 0;
  border-top: 2px dotted #eee;
}

body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 12px;
  line-height: 1.428571429;
  color: #333;
  background-color: #fff;
}



 @page  { margin: 50px 30px; }
 .header { position: fixed; left: 0px; top: 0px; right: 0px; height: 150px;  text-align: center; }
 .content {margin-top: 10px; }
 .footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 50px;  }
 .footer .page:after { content: counter(page, upper-roman); }



</style>

</head>

<body>

  <div class="header">
     <table >

      <tr>


       
        <td style="width:150px">

            <?php if($organization->logo == null || $organization->logo == ''): ?>
            <?php else: ?>
            <img src="<?php echo e(public_path().'/uploads/logo/'.$organization->logo); ?>" alt="logo" width="80%" alt="no logo">
            <?php endif; ?>

    
        </td>

        <td>
        <strong>
          <?php echo e(strtoupper($organization->name)); ?><br>
          </strong>
          <?php echo e($organization->phone); ?><br>
          <?php echo e($organization->email); ?><br>
          <?php echo e($organization->address); ?>

       

        </td>
        

      </tr>


    </table>
   </div>

<br>
<?php $currency = ''; ?>
<?php if($organization->currency_shortname == null || $organization->currency_shortname == ''): ?>
<?php $currency = 'KES'; ?>
<?php else: ?>
<?php $currency = $organization->currency_shortname; ?>
<?php endif; ?>
 
	<div class="content" style='margin-top:50px;'>
 
   <div align="center"><h3><strong>Booking report for <?php echo e($booking->ticketno); ?></strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <?php if(Auth::user()->type == 'Car Hire'): ?>
      <tr><td><strong>Receipt No.</strong></td><td><?php echo e($booking->ticketno); ?></td></tr><tr>
        <?php else: ?>
        <tr><td><strong>Ticket No.</strong></td><td><?php echo e($booking->ticketno); ?></td></tr><tr>
        <?php endif; ?>
        <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi'): ?>
        <td><strong>Vehicle</strong></td>
        <?php elseif(Auth::user()->type == 'SGR'): ?>
        <td><strong>Train</strong></td>
        <?php elseif(Auth::user()->type == 'Airline'): ?>
        <td><strong>Airplane</strong></td>
        <?php elseif(Auth::user()->type == 'Events'): ?>
        <td><strong>Event</strong></td>
        <?php elseif(Auth::user()->type == 'Hotel'): ?>
        <td></td>
        <?php elseif(Auth::user()->type == 'Car Hire'): ?>
        <td><strong>Vehicle</strong></td>
        <?php endif; ?>
        <?php if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel'): ?>
        <td><?php echo e(App\Booking::getVehicle($booking->vehicle_id)->regno.' '.App\Booking::getVehicle($booking->vehicle_id)->vehiclename->name); ?></td>
        <?php elseif(Auth::user()->type == 'Events'): ?>
        <td><?php echo e(App\Booking::getEvent($booking->event_id)->name); ?></td>
        <?php elseif(Auth::user()->type == 'Hotel'): ?>
        <td></td>
        <?php endif; ?>
        </tr>
        <tr><td><strong>Customer</strong></td><td><?php echo e($booking->firstname.' '.$booking->lastname); ?></td></tr>
        <?php if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel' && Auth::user()->type != 'Car Hire'): ?>
        <tr><td><strong>Seat No.</strong></td><td><?php echo e($booking->seatno); ?></td></tr>
        <?php endif; ?>
        <?php if(Auth::user()->type != 'Events' && Auth::user()->type != 'Events' && Auth::user()->type != 'Car Hire'): ?>
        <tr><td><strong>Travel Date</strong></td><td><?php echo e($booking->travel_date); ?></td></tr>
        <?php elseif(Auth::user()->type == 'Events'): ?>
        <tr><td><strong>Event Date</strong></td><td><?php echo e($booking->travel_date); ?></td></tr>
        <?php elseif(Auth::user()->type == 'Hotel'): ?>
        <tr><td><strong>Check-In Date/Time</strong></td><td><?php echo e($booking->travel_date); ?></td></tr>
        <?php elseif(Auth::user()->type == 'Car Hire'): ?>
        <tr><td><strong>Start Date</strong></td><td><?php echo e($booking->start_date); ?></td></tr>
        <tr><td><strong>End Date</strong></td><td><?php echo e($booking->end_date); ?></td></tr>
        <?php endif; ?>
        <tr><td><strong>Date Booked</strong></td><td><?php echo e($booking->date); ?></td></tr>
        <tr><td><strong>Amount (<?php echo e($currency); ?>)</strong></td><td align="right"><strong><?php echo e(number_format($booking->amount,2)); ?></strong></td></tr>
      </tr>
      
      
    </table>

<br><br>

   
</div>


</body>

</html>



