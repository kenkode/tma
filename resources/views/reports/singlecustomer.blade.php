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
 
   <div align="center"><h3><strong>Booking report for {{$booking->id_number.' : '.$booking->firstname.' '.$booking->lastname}}</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr><td><strong>Ticket No.</strong></td><td>{{$booking->ticketno}}</td></tr>
      <tr><td><strong>Firstname</strong></td><td>{{$booking->firstname}}</td></tr>
      <tr><td><strong>Lastname</strong></td><td>{{$booking->lastname}}</td></tr>
      <tr><td><strong>Email</strong></td><td>{{$booking->email}}</td></tr>
      <tr><td><strong>ID / Passport No.</strong></td><td>{{$booking->id_number}}</td></tr>
      <tr><td><strong>Contact</strong></td><td>{{$booking->phone}}</td></tr>
      
      
    </table>

<br><br>

   
</div>


</body>

</html>



