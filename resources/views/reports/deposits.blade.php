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

   <div align="center"><h3><strong>Advanced Payment Settings</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
        <td><strong>#</strong></td>
        <td><strong>Month</strong></td>
        <td><strong>Advanced Payment (% of Total Amount)</strong></td>
      </tr>
      <tr>
        <td>1</td>
        <td>January</td>
        <td>{{$deposit->jan}}</td> 
      </tr>
      <tr>
        <td>2</td>
        <td>February</td>
        <td>{{$deposit->feb}}</td> 
      </tr>
      <tr>
        <td>3</td>
        <td>March</td>
        <td>{{$deposit->mar}}</td> 
      </tr>
      <tr>
        <td>4</td>
        <td>April</td>
        <td>{{$deposit->apr}}</td> 
      </tr>
      <tr>
        <td>5</td>
        <td>May</td>
        <td>{{$deposit->may}}</td> 
      </tr>
      <tr>
        <td>6</td>
        <td>June</td>
        <td>{{$deposit->jun}}</td> 
      </tr>
      <tr>
        <td>7</td>
        <td>July</td>
        <td>{{$deposit->jul}}</td> 
      </tr>
      <tr>
        <td>8</td>
        <td>August</td>
        <td>{{$deposit->aug}}</td> 
      </tr>
      <tr>
        <td>9</td>
        <td>September</td>
        <td>{{$deposit->sep}}</td> 
      </tr>
      <tr>
        <td>10</td>
        <td>October</td>
        <td>{{$deposit->oct}}</td> 
      </tr>
      <tr>
        <td>11</td>
        <td>November</td>
        <td>{{$deposit->nov}}</td> 
      </tr>
      <tr>
        <td>12</td>
        <td>December</td>
        <td>{{$deposit->dec}}</td> 
      </tr>
    </table>

<br><br>

   
</div>


</body>

</html>



