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
	
    <div align="center"><h3><strong>Pricing Plan</strong></h3></div>

    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td width='20'><strong># </strong></td>
        <td><strong>Branch</strong></td>
        <td><strong>Room Type</strong></td>
        <td><strong>Mon </strong></td> 
        <td><strong>Tue </strong></td> 
        <td><strong>Wed </strong></td> 
        <td><strong>Thur </strong></td>
        <td><strong>Fri </strong></td>
        <td><strong>Sat </strong></td>
        <td><strong>Sun </strong></td>
        <td><strong>Children % </strong></td>
      </tr>
      <?php $i =1; ?>
      @foreach($pricings as $pricing)
      <tr>

       <td>{{$i}}</td>
          <td>{{$pricing->branch->name}}</td>
          <td>{{$pricing->roomtype->name}}</td>
          <td>{{number_format($pricing->mon,2)}}</td>
          <td>{{number_format($pricing->tue,2)}}</td>
          <td>{{number_format($pricing->wen,2)}}</td>
          <td>{{number_format($pricing->thur,2)}}</td>
          <td>{{number_format($pricing->fri,2)}}</td>
          <td>{{number_format($pricing->sat,2)}}</td>
          <td>{{number_format($pricing->sun,2)}}</td>
          <td>{{$pricing->children}}</td>
        </tr>
      <?php $i++; ?>
   
    @endforeach
      
    </table>

<br><br>

   
</div>


</body>

</html>



