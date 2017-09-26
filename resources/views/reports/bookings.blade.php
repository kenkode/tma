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



 @page { margin: 50px 30px; }
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

            @if($organization->logo == null || $organization->logo == '')
            @else
            <img src="{{public_path().'/uploads/logo/'.$organization->logo}}" alt="logo" width="80%" alt="no logo">
            @endif

    
        </td>

        <td>
        <strong>
          {{ strtoupper($organization->name)}}<br>
          </strong>
          {{ $organization->phone}}<br>
          {{ $organization->email}}<br>
          {{ $organization->address}}
       

        </td>
        

      </tr>


    </table>
   </div>

<br>
<?php $currency = ''; ?>
@if($organization->currency_shortname == null || $organization->currency_shortname == '')
<?php $currency = 'KES'; ?>
@else
<?php $currency = $organization->currency_shortname; ?>
@endif
 
	<div class="content" style='margin-top:50px;'>
 
   <div align="center"><h3><strong>Booking report for period {{$from}} and {{$to}}</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td><strong>#</strong></td>
        <td><strong>Ticket No.</strong></td>
        @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
        <td><strong>Vehicle</strong></td>
        @elseif(Auth::user()->type == 'SGR')
        <td><strong>Train</strong></td>
        @elseif(Auth::user()->type == 'Airline')
        <td><strong>Airplane</strong></td>
        @elseif(Auth::user()->type == 'Events')
        <td><strong>Event</strong></td>
        @elseif(Auth::user()->type == 'Events')
        @endif
        <td><strong>Customer</strong></td>
        @if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel')
        <td><strong>Seat No.</strong></td>
        @endif

        @if(Auth::user()->type != 'Events')
        <td><strong>Travel Date</strong></td>
        @elseif(Auth::user()->type == 'Events')
        <td><strong>Event Date</strong></td>
        @elseif(Auth::user()->type == 'Hotel')
        <td><strong>Check-In Date/Time</strong></td>
        @endif
        <td><strong>Date Booked</strong></td>
        <td><strong>Amount ({{$currency}})</strong></td>
      </tr>
      <?php $i =1; 
            $total = 0;
      ?>
      @foreach($bookings as $booking)
      <tr>
          <td valign="top">{{$i}}</td>
          <td valign="top">{{$booking->ticketno}}</td>
          @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi' || Auth::user()->type == 'SGR' || Auth::user()->type == 'Airline')
          <td valign="top">{{App\Booking::getVehicle($booking->vehicle_id)->regno.' '.App\Booking::getVehicle($booking->vehicle_id)->vehiclename->name}}</td>
          @elseif(Auth::user()->type == 'Events')
          <td valign="top">{{App\Booking::getEvent($booking->event_id)->name}}</td>
          @elseif(Auth::user()->type == 'Hotel')
          @endif
          <td valign="top">{{$booking->firstname.' '.$booking->lastname}}</td>
          @if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel')
          <td valign="top">{{$booking->seatno}}</td>
          @endif
          <td valign="top">{{$booking->travel_date}}</td>
          <td valign="top">{{$booking->date}}</td>
          <td valign="top" align="right">{{number_format($booking->amount,2)}}</td>
      <?php
       $total = $total + $booking->amount;
       $i++; ?>
   
    @endforeach
    @if(Auth::user()->type == 'Events')
    <tr>
      <td colspan="6" align="right"><strong>Total</strong></td><td align="right"><strong>{{number_format($total,2)}}</strong></td>
    </tr>
    @elseif(Auth::user()->type == 'Hotel')
    <tr>
      <td colspan="5" align="right"><strong>Total</strong></td><td align="right"><strong>{{number_format($total,2)}}</strong></td>
    </tr>
    @else
    <tr>
      <td colspan="7" align="right"><strong>Total</strong></td><td align="right"><strong>{{number_format($total,2)}}</strong></td>
    </tr>
    @endif
    </table>

<br><br>

   
</div>


</body>

</html>



