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

        @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
        <div align="center"><h3><strong>Vehicle names Report</strong></h3></div>
        @elseif(Auth::user()->type == 'SGR')
        <div align="center"><h3><strong>Train names Report</strong></h3></div>
        @elseif(Auth::user()->type == 'Airline')
        <div align="center"><h3><strong>Airplane names Report</strong></h3></div>
        @endif
 
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td><strong># </strong></td>
        <td><strong>Logo </strong></td>
        <td><strong>Name </strong></td> 
      </tr>
      <?php $i =1; ?>
      @foreach($vehiclenames as $vehiclename)
      <tr>


       <td valign="top">{{$i}}</td>
            @if($vehiclename->logo == null || $vehiclename->logo == '')
            <td></td>
            @else
            <td><img src="{{url('/public/uploads/logo/'.$vehiclename->logo)}}" width="100" height="100" alt="no logo" /></td>
            @endif
        <td valign="top"> {{ $vehiclename->name }}</td>
        </tr>
      <?php $i++; ?>
   
    @endforeach
      
    </table>

<br><br>

   
</div>


</body>

</html>



