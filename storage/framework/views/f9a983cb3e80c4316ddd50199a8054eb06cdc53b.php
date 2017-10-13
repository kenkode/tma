Hello <?php echo e($firstname.' '.$lastname); ?>,<br/>
This is a confirmation that you have successfully hired <?php echo e(count($types)); ?> cars on <?php echo e(date('d-M-Y')); ?>.<br><br>Your booking details are:<br>
<table border='0'>
	<tr><td><strong>Ticket number  :</strong></td><td><?php echo e($ticketno); ?></td></tr>
	<tr><td><strong>First name :</strong></td><td><?php echo e($firstname); ?></td></tr>
	<tr><td><strong>Last name :</strong></td><td><?php echo e($lastname); ?></td></tr>
	<tr><td><strong>Phone number :</strong></td><td><?php echo e($phone); ?></td></tr>
	<tr><td><strong>ID / Passport Number :</strong></td><td><?php echo e($idno); ?></td></tr>
    <tr><td colspan="2"><strong>Cars hired :- <strong></td></tr>
    <?php $i=0;?>
	<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<tr><td><strong><?php echo e($type.' ('.$nums[$i].' * '.number_format((float)$amounts[$i],2).')'); ?> :</strong></td><td><?php echo e("KES ".number_format(((int)$nums[$i] * (float)$amounts[$i]),2)); ?></td></tr>
	<?php $i++;?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<tr><td><strong>Total Amount * <?php echo e($diffDays); ?> days:</strong></td><td>KES <?php echo e(number_format((float)$total,2)); ?></td></tr>
	<tr><td><strong>Payment Mode :</strong></td><td><?php echo e($mode); ?></td></tr>
	<tr><td><strong>Hire Date :</strong></td><td><?php echo e($startdate.' to '.$enddate); ?></td></tr>
</table>
<br><br> 
For mor information contact us on...<a href='#'>upstridge.com</a>";
