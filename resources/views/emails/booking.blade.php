Hello {{$firstname.' '.$lastname}},<br/>
This is a confirmation that you have successfully hired {{count($types)}} cars on {{date('d-M-Y')}}.<br><br>Your booking details are:<br>
<table border='0'>
	<tr><td><strong>Ticket number  :</strong></td><td>{{$ticketno}}</td></tr>
	<tr><td><strong>First name :</strong></td><td>{{$firstname}}</td></tr>
	<tr><td><strong>Last name :</strong></td><td>{{$lastname}}</td></tr>
	<tr><td><strong>Phone number :</strong></td><td>{{$phone}}</td></tr>
	<tr><td><strong>ID / Passport Number :</strong></td><td>{{$idno}}</td></tr>
    <tr><td colspan="2"><strong>Cars hired :- <strong></td></tr>
    <?php $i=0;?>
	@foreach($types as $type)
	<tr><td><strong>{{$type.' ('.$nums[$i].' * '.number_format((float)$amounts[$i],2).')'}} :</strong></td><td>{{"KES ".number_format(((int)$nums[$i] * (float)$amounts[$i]),2)}}</td></tr>
	<?php $i++;?>
    @endforeach
	<tr><td><strong>Total Amount * {{$diffDays}} days:</strong></td><td>KES {{number_format((float)$total,2)}}</td></tr>
	<tr><td><strong>Payment Mode :</strong></td><td>{{$mode}}</td></tr>
	<tr><td><strong>Hire Date :</strong></td><td>{{$startdate.' to '.$enddate}}</td></tr>
</table>
<br><br> 
For mor information contact us on...<a href='#'>upstridge.com</a>";
