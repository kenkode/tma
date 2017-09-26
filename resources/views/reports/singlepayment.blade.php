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
 
   <div align="center"><h3><strong>Payment report for {{$booking->ticketno}}</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr><td><strong>Ticket No.</strong></td><td>{{$booking->ticketno}}</td></tr><tr>
        @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
        <td><strong>Vehicle</strong></td>
        @elseif(Auth::user()->type == 'SGR')
        <td><strong>Train</strong></td>
        @elseif(Auth::user()->type == 'Airline')
        <td><strong>Airplane</strong></td>
        @elseif(Auth::user()->type == 'Events')
        <td><strong>Event</strong></td>
        @elseif(Auth::user()->type == 'Hotel')
        @endif
        @if(Auth::user()->type == 'Events')
        <td>{{App\Booking::getEvent($booking->event_id)->name}}</td>
        @elseif(Auth::user()->type == 'Hotel')
        <td></td>
        @else
        <td>{{App\Booking::getVehicle($booking->vehicle_id)->regno.' '.App\Booking::getVehicle($booking->vehicle_id)->vehiclename->name}}</td>
        @endif
        </tr>
        <tr><td><strong>Customer</strong></td><td>{{$booking->firstname.' '.$booking->lastname}}</td></tr>
        <tr><td><strong>Date Booked</strong></td><td>{{$booking->date}}</td></tr>
        <tr><td><strong>Payment Option</strong></td><td>{{$booking->mode_of_payment}}</td></tr>
        <tr><td><strong>Amount ({{$currency}})</strong></td><td align="right"><strong>{{number_format($booking->amount,2)}}</strong></td></tr>
      </tr>
      
      
    </table>

<br><br>

   
</div>


</body>

</html>



