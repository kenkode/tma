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
 
   <div align="center"><h3><strong>Events report</strong></h3></div>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
     

        <td><strong>#</strong></td>
        <td><strong>Logo </strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Contact</strong></td>
        <td><strong>Address</strong></td>
        <td><strong>VIP Entrance Fee ({{$currency}})</strong></td>
        <td><strong>Normal Entrance Fee ({{$currency}})</strong></td>
        <td><strong>Children Entrance Fee ({{$currency}})</strong></td>
      </tr>
      <?php $i =1; 
            $viptotal = 0;
            $normaltotal = 0;
            $childrentotal = 0;
      ?>
      @foreach($events as $event)
      <tr>
          <td valign="top">{{$i}}</td>
            @if($organization->logo == null || $organization->logo == '')
            <td></td>
            @else
            <td><img src="{{public_path().'/uploads/logo/'.$event->image}}" width="100" height="100" alt="no logo" /></td>
            @endif
          <td valign="top">{{$event->name}}</td>
          <td valign="top">{{$event->description}}</td>
          <td valign="top">{{$event->contact}}</td>
          <td valign="top">{{$event->address}}</td>
          <td valign="top" align="right">{{number_format($event->vip,2)}}</td>
          <td valign="top" align="right">{{number_format($event->normal,2)}}</td>
          <td valign="top" align="right">{{number_format($event->children,2)}}</td>
      <?php
       $viptotal = $viptotal + $event->vip;
       $normaltotal = $normaltotal + $event->normal;
       $childrentotal = $childrentotal + $event->children;
       $i++; ?>
   
    @endforeach
    <tr>
      <td colspan="6" align="right"><strong>Total</strong></td><td align="right"><strong>{{number_format($viptotal,2)}}</strong></td><td align="right"><strong>{{number_format($normaltotal,2)}}</strong></td><td align="right"><strong>{{number_format($childrentotal,2)}}</strong></td>
    </tr>
      
    </table>

<br><br>

   
</div>


</body>

</html>



