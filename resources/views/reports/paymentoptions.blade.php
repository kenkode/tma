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
 
   <div align="center"><h3><strong>Payment Options Report</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td><strong># </strong></td>
        <td><strong>Vehicle </strong></td>
        @if(Auth::user()->type != 'Taxi')
        <td><strong>Origin</strong></td>
        <td><strong>Destination</strong></td>
        <td><strong>VIP Fare ({{$currency}}) </strong></td>
        <td><strong>Normal Fare ({{$currency}}) </strong></td>
        @else
        <td><strong>Fare per Kilometer ({{$currency}}) </strong></td>
        @endif
      </tr>
      <?php $i =1; ?>
      @foreach($payments as $payment)
      <tr>
        <td valign="top">{{$i}}</td>
        <td valign="top">{{App\Payment::getVehicle($payment->vehicle_id)}}</td>
        @if(Auth::user()->type != 'Taxi')
        <td>{{App\Schedule::getDestination($payment->origin_id)->name}}</td>
        <td>{{App\Schedule::getDestination($payment->destination_id)->name}}</td>
        <td valign="top">{{ number_format($payment->firstclass,2) }}</td>
        @endif
        <td valign="top"> {{ number_format($payment->economic,2) }}</td>
        </tr>
      <?php $i++; ?>
   
    @endforeach
      
    </table>

<br><br>

   
</div>


</body>

</html>



