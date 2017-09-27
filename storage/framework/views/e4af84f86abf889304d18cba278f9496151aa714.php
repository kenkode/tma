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
 
   <div align="center"><h3><strong>Booking report for period <?php echo e($from); ?> and <?php echo e($to); ?></strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td><strong>#</strong></td>
        <?php if(Auth::user()->type == 'Car Hire'): ?>
        <td><strong>Receipt No.</strong></td>
        <?php else: ?>
        <td><strong>Ticket No.</strong></td>
        <?php endif; ?>
        <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi' || Auth::user()->type == 'Car Hire'): ?>
        <td><strong>Vehicle</strong></td>
        <?php elseif(Auth::user()->type == 'SGR'): ?>
        <td><strong>Train</strong></td>
        <?php elseif(Auth::user()->type == 'Airline'): ?>
        <td><strong>Airplane</strong></td>
        <?php elseif(Auth::user()->type == 'Events'): ?>
        <td><strong>Event</strong></td>
        <?php elseif(Auth::user()->type == 'Hotel'): ?>
        <?php endif; ?>
        <td><strong>Customer</strong></td>
        <?php if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel' && Auth::user()->type != 'Car Hire'): ?>
        <td><strong>Seat No.</strong></td>
        <?php endif; ?>

        <?php if(Auth::user()->type == 'Events'): ?>
        <td><strong>Event Date</strong></td>
        <?php elseif(Auth::user()->type == 'Hotel'): ?>
        <td><strong>Check-In Date/Time</strong></td>
        <?php elseif(Auth::user()->type == 'Car Hire'): ?>
        <td><strong>Start Date</strong></td>
        <td><strong>End Date</strong></td>
        <?php else: ?>
        <td><strong>Travel Date</strong></td>
        <?php endif; ?>
        <td><strong>Date Booked</strong></td>
        <td><strong>Amount (<?php echo e($currency); ?>)</strong></td>
      </tr>
      <?php $i =1; 
            $total = 0;
      ?>
      <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <tr>
          <td valign="top"><?php echo e($i); ?></td>
          <td valign="top"><?php echo e($booking->ticketno); ?></td>
          <?php if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi' || Auth::user()->type == 'SGR' || Auth::user()->type == 'Airline'): ?>
          <td valign="top"><?php echo e(App\Booking::getVehicle($booking->vehicle_id)->regno.' '.App\Booking::getVehicle($booking->vehicle_id)->vehiclename->name); ?></td>
          <?php elseif(Auth::user()->type == 'Car Hire'): ?>
          <td valign="top"><?php echo e(App\Booking::getVehicle($booking->vehicle_id)->regno.' '.App\Booking::getVehicle($booking->vehicle_id)->type); ?></td>
          <?php elseif(Auth::user()->type == 'Events'): ?>
          <td valign="top"><?php echo e(App\Booking::getEvent($booking->event_id)->name); ?></td>
          <?php elseif(Auth::user()->type == 'Hotel'): ?>
          <?php endif; ?>
          <td valign="top"><?php echo e($booking->firstname.' '.$booking->lastname); ?></td>
          <?php if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel' && Auth::user()->type != 'Car Hire'): ?>
          <td valign="top"><?php echo e($booking->seatno); ?></td>
          <?php endif; ?>
          <?php if(Auth::user()->type == 'Car Hire'): ?>
          <td valign="top"><?php echo e($booking->start_date); ?></td>
          <td valign="top"><?php echo e($booking->end_date); ?></td>
          <?php else: ?>
          <td valign="top"><?php echo e($booking->travel_date); ?></td>
          <?php endif; ?>
          <td valign="top"><?php echo e($booking->date); ?></td>
          <td valign="top" align="right"><?php echo e(number_format($booking->amount,2)); ?></td>
      <?php
       $total = $total + $booking->amount;
       $i++; ?>
   
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php if(Auth::user()->type == 'Events'): ?>
    <tr>
      <td colspan="6" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo e(number_format($total,2)); ?></strong></td>
    </tr>
    <?php elseif(Auth::user()->type == 'Hotel'): ?>
    <tr>
      <td colspan="5" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo e(number_format($total,2)); ?></strong></td>
    </tr>
    <?php else: ?>
    <tr>
      <td colspan="7" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo e(number_format($total,2)); ?></strong></td>
    </tr>
    <?php endif; ?>
    </table>

<br><br>

   
</div>


</body>

</html>



