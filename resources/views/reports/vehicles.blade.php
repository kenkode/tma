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
  margin-top: 1px;
  margin-bottom: 2px;
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
	  @if($status == 'all')
    <div align="center"><h3><strong>Vehicles Report</strong></h3></div>
    @elseif($status == 1)
    <div align="center"><h3><strong>Active Vehicles Report</strong></h3></div>
    @elseif($status == 0)
    <div align="center"><h3><strong>Inactive Vehicle names Report</strong></h3></div>
    @endif

    @elseif(Auth::user()->type == 'SGR')
    @if($status == 'all')
    <div align="center"><h3><strong>Train Report</strong></h3></div>
    @elseif($status == 1)
    <div align="center"><h3><strong>Active Trains Report</strong></h3></div>
    @elseif($status == 0)
    <div align="center"><h3><strong>Inactive Train names Report</strong></h3></div>
    @endif

    @elseif(Auth::user()->type == 'Airline')
    @if($status == 'all')
    <div align="center"><h3><strong>Airplanes Report</strong></h3></div>
    @elseif($status == 1)
    <div align="center"><h3><strong>Active Airplanes Report</strong></h3></div>
    @elseif($status == 0)
    <div align="center"><h3><strong>Inactive Airplane names Report</strong></h3></div>
    @endif
    @endif

    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td width='20'><strong># </strong></td>
        @if(Auth::user()->type == 'Travel' || Auth::user()->type == 'Taxi')
        <td><strong>Reg No.</strong></td>
        @elseif(Auth::user()->type == 'SGR')
        <td><strong>Reporting Number</strong></td>
        @elseif(Auth::user()->type == 'Airline')
        <td><strong>Reporting Number</strong></td>
        @endif
        <td><strong>Name </strong></td> 
        <td><strong>Capacity </strong></td> 
        @if(Auth::user()->type == 'Travel')
        <td><strong>Type </strong></td> 
        <td><strong>Has Conductor </strong></td>
        <td><strong>Has Chair </strong></td> 
        @endif
        @if($status == 'all') 
        <td><strong>Active </strong></td> 
        @endif
      </tr>
      <?php $i =1; ?>
      @foreach($vehicles as $vehicle)
      <tr>


       <td width='20'>{{$i}}</td>
        <td>{{ $vehicle->regno }}</td>
        <td> {{ $vehicle->vehiclename->name }}</td>
        <td> {{ $vehicle->capacity }}</td>
        @if(Auth::user()->type == 'Travel')
        <td> {{ $vehicle->type }}</td>
        @if($vehicle->has_conductor == 1)
        <td> Yes</td>
        @else
        <td> No</td>
        @endif
        @if($vehicle->has_chair == 1)
        <td> Yes</td>
        @else
        <td> No</td>
        @endif
        @endif
        @if($status == 'all')
        @if($vehicle->active == 1)
        <td> Yes</td>
        @else
        <td> No</td>
        @endif
        @endif
        </tr>
      <?php $i++; ?>
   
    @endforeach
      
    </table>

<br><br>

   
</div>


</body>

</html>



