Hello <?php echo e($firstname.' '.$lastname); ?>,<br/>
This is a confirmation that you have successfully booked <?php echo e($vehicle->name); ?> on <?php echo e(date('d-M-Y')); ?>.<br><br>Your booking details are:<br>
<table border='0'>
	<tr><td><strong>Ticket number  :</strong></td><td><?php echo e($ticketno); ?></td></tr>
	<tr><td><strong>First name :</strong></td><td><?php echo e($firstname); ?></td></tr>
	<tr><td><strong>Last name :</strong></td><td><?php echo e($lastname); ?></td></tr>
	<tr><td><strong>Phone number :</strong></td><td><?php echo e($phone); ?></td></tr>
	<tr><td><strong>ID / Passport Number :</strong></td><td><?php echo e($idno); ?></td></tr>
	<tr><td><strong>Seat No:</strong></td><td><?php echo e(preg_replace("/[^0-9]/", "",$seat)); ?></td></tr>
	<tr><td><strong>Amount :</strong></td><td>KES <?php echo e(number_format((float)$amount,2)); ?></td></tr>
	<tr><td><strong>Payment Mode :</strong></td><td><?php echo e($paymentmode); ?></td></tr>
	<tr><td><strong>Vehicle :</strong></td><td><?php echo e($vehicle->regno.' - '.$vehicle->name); ?></td></tr>
	<tr><td><strong>Travel Date :</strong></td><td><?php echo e($date); ?></td></tr>
	<tr><td><strong>Travel Time :</strong></td><td><?php echo e($time); ?></td></tr>
</table>
<br><br> 
For mor information contact us on...<a href='#'>upstridge.com</a>";
