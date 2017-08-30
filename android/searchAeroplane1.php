<?php
    include'db.php';
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $destination = $_POST['destination'];
    $origin = $_POST['origin'];
    //$time = $_POST['time'];

    /*$destination = "Mombasa";
    $origin = "Nairobi";
    $time = "Night";*/

    $timerange1 = '';
    $timerange2 = '';

    if($time == 'Morning'){
      $earlydate  = strtotime(date('Y-m-d').' '.'00:00:00');
      $latedate   = strtotime(date('Y-m-d').' '.'11:59:59');
      $timerange1 = date('Y-m-d H:i:s', $earlydate);
      $timerange2 = date('Y-m-d H:i:s', $latedate);
    }else if($time == 'Afternoon'){
      $earlydate  = strtotime(date('Y-m-d').' '.'12:00:00');
      $latedate   = strtotime(date('Y-m-d').' '.'15:59:59');
      $timerange1 = date('Y-m-d H:i:s', $earlydate);
      $timerange2 = date('Y-m-d H:i:s', $latedate);
    }else if($time == 'Evening'){
      $earlydate  = strtotime(date('Y-m-d').' '.'16:00:00');
      $latedate   = strtotime(date('Y-m-d').' '.'18:59:59');
      $timerange1 = date('Y-m-d H:i:s', $earlydate);
      $timerange2 = date('Y-m-d H:i:s', $latedate);
    }else if($time == 'Night'){
      $earlydate  = strtotime(date('Y-m-d').' '.'19:00:00');
      $latedate   = strtotime(date('Y-m-d').' '.'23:59:59');
      $timerange1 = date('Y-m-d H:i:s', $earlydate);
      $timerange2 = date('Y-m-d H:i:s', $latedate);
    }


    /*$destination = "Mombasa";
    $origin = "Nairobi";
    $date = "2017-05-12";
    $time = "21:00";*/
    //$newdate = strtotime($date.' '.$time);
    //$datetime = date('Y-m-d H:i:s', $newdate);
    
    $flag = array();

	$query = mysqli_query($con, "select vehiclenames.name, vehiclenames.logo, vehicles.type, vehicles.capacity, schedules.vehicle_id, schedules.organization_id, firstclass_apply, economic_apply, origin.oname, origin.oid, des.did, des.dname, arrival, departure from schedules 
	 left join vehicles on schedules.vehicle_id=vehicles.id 
	 left join vehiclenames on vehicles.vehiclename_id=vehiclenames.id 
	 left join (select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id where routes.name='".$origin."') as origin on schedules.origin_id=origin.oid
	 left join (select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id where routes.name='".$destination."') as des on schedules.destination_id=des.did
	 where departure >= '".$timerange1."' and departure <= '".$timerange2."' and origin.oname='".$origin."' and des.dname='".$destination."' and vehiclenames.type='Airline'");
	
	if($query){
		while ($row = mysqli_fetch_array($query)) {
			$flag = $row;
			$paymentquery = mysqli_query($con, "select firstclass, economic,children,business from payments 
	        left join vehicles on payments.vehicle_id=vehicles.id 
	        where origin_id='".$row['oid']."' and destination_id='".$row['did']."'");
			//echo $paymentquery;

		while ($payment = mysqli_fetch_array($paymentquery)) {
			$flag['10'] = $payment['firstclass'];
			$flag['firstclass'] = $payment['firstclass'];
			$flag['11'] = $payment['economic'];
			$flag['economic'] = $payment['economic'];
      $flag['12'] = $payment['business'];
      $flag['business'] = $payment['business'];
      $flag['13'] = $payment['children'];
      $flag['children'] = $payment['children'];
		}
	}
	$flag = array($flag);
	//array_push($flag, $payflag);
		print(json_encode($flag));
	}
	mysqli_close($con);
?>