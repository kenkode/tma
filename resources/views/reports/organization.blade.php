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
 
	<div class="content" style='margin-top:50px;'>
    <table width="500" border='1' cellspacing='0' cellpadding='0'>

      <tr><td><strong>Logo:</strong></td>
      @if($organization->logo == null || $organization->logo == '')
      <td></td>
      @else
      <td><img src="{{url('/public/uploads/logo/'.$organization->logo)}}" width="100" height="100" alt="no logo" /></td>
      @endif
      </tr>
        <tr><td><strong>Name:</strong></td><td>{{$organization->name}}</td></tr>
        <tr><td><strong>Email:</strong></td><td>{{$organization->email}}</td></tr>
        <tr><td><strong>Phone:</strong></td><td>{{$organization->phone}}</td></tr>
        <tr><td><strong>Address:</strong></td><td>{{$organization->address}}</td></tr>
        <tr><td><strong>Currency Name:</strong></td><td>{{$organization->currency_name}}</td></tr>
        <tr><td><strong>Currency Shortname:</strong></td><td>{{$organization->currency_shortname}}</td></tr>
        <tr>
        <td width="200"><strong>Areas of Operation:</strong></td>
        <td>
        <ul style="margin-left:-10px;">
        @if($organization->is_nairobi == 1)
        <li>Nairobi Province</li>
        @endif
        @if($organization->is_central == 1)
        <li>Central Province</li>
        @endif
        @if($organization->is_coast == 1)
        <li>Coast Province</li>
        @endif
        @if($organization->is_western == 1)
        <li>Western Province</li>
        @endif
        @if($organization->is_nyanza == 1)
        <li>Nyanza Province</li>
        @endif
        @if($organization->is_northeastern == 1)
        <li>North-Eastern Province</li>
        @endif
        @if($organization->is_eastern == 1)
        <li>Eastern Province</li>
        @endif
        @if($organization->is_rift == 1)
        <li>Rift-Valley Province</li>
        @endif
        </ul>
        </td>
        </tr>
      
    </table>

<br><br>

   
</div>


</body>

</html>



