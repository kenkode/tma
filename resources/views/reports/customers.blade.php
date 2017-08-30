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

 
	<div class="content" style='margin-top:50px;'>
 
   <div align="center"><h3><strong>Booking report for period {{$from}} and {{$to}}</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td><strong>#</strong></td>
        <td><strong>Ticket No.</strong></td>
        <td><strong>Firstname</strong></td>
        <td><strong>Lastname</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>ID / Passport No.</strong></td>
        <td><strong>Contact</strong></td>
      </tr>
      <?php $i =1; 
      ?>
      @foreach($bookings as $booking)
      <tr>
          <td valign="top">{{$i}}</td>
          <td valign="top">{{$booking->ticketno}}</td>
          <td valign="top">{{$booking->firstname}}</td>
          <td valign="top">{{$booking->lastname}}</td>
          <td valign="top">{{$booking->email}}</td>
          <td valign="top">{{$booking->id_number}}</td>
          <td valign="top">{{$booking->phone}}</td>
      <?php
       $i++; ?>
   
    @endforeach
   
      
    </table>

<br><br>

   
</div>


</body>

</html>



