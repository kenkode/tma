Hello {{$firstname.' '.$lastname}},<br/>
This is a confirmation that you have successfully booked {{$vehicle->name}} on {{date('d-M-Y')}}.<br><br>Your booking details are:<br>
<table border='0'>
	<tr><td><strong>Ticket number  :</strong></td><td>{{$ticketno}}</td></tr>
	<tr><td><strong>First name :</strong></td><td>{{$firstname}}</td></tr>
	<tr><td><strong>Last name :</strong></td><td>{{$lastname}}</td></tr>
	<tr><td><strong>Phone number :</strong></td><td>{{$phone}}</td></tr>
	<tr><td><strong>ID / Passport Number :</strong></td><td>{{$idno}}</td></tr>
	<tr><td><strong>Seat No:</strong></td><td>{{preg_replace("/[^0-9]/", "",$seat)}}</td></tr>
	<tr><td><strong>Amount :</strong></td><td>KES {{number_format((float)$amount,2)}}</td></tr>
	<tr><td><strong>Payment Mode :</strong></td><td>{{$paymentmode}}</td></tr>
	<tr><td><strong>Vehicle :</strong></td><td>{{$vehicle->regno.' - '.$vehicle->name}}</td></tr>
	<tr><td><strong>Travel Date :</strong></td><td>{{$date}}</td></tr>
	<tr><td><strong>Travel Time :</strong></td><td>{{$time}}</td></tr>
</table>
<br><br> 
For mor information contact us on...<a href='#'>upstridge.com</a>";
