<?php
    include'db.php';
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    /*$destination = $_POST['destination'];
    $origin = $_POST['origin'];
    $date = $_POST['date'];
    $time = $_POST['time'];*/

    /*$destination = "Mombasa";
    $origin = "Nairobi";
    $time = "Night";*/

    


    $destination = "Mombasa";
    $origin = "Nairobi";
    $date = "2017-06-21";
    $time = "21:00";
    $newdate = strtotime($date.' '.$time);
    $datetime = date('Y-m-d H:i:s', $newdate);
    
    $flag = array();

	$query = mysqli_query($con, "select vehiclenames.name, vehiclenames.logo, vehicles.type, vehicles.capacity, schedules.vehicle_id, schedules.organization_id, firstclass_apply, economic_apply, origin.oname, origin.oid, des.did, des.dname, arrival, departure from schedules 
	 left join vehicles on schedules.vehicle_id=vehicles.id 
	 left join vehiclenames on vehicles.vehiclename_id=vehiclenames.id 
	 left join (select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id where routes.name='".$origin."') as origin on schedules.origin_id=origin.oid
	 left join (select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id where routes.name='".$destination."') as des on schedules.destination_id=des.did
	 where origin.oname='".$origin."' and des.dname='".$destination."' and vehiclenames.type='SGR'");
	
	if($query){
		while ($row = mysqli_fetch_array($query)) {
			$flag = $row;
			$paymentquery = mysqli_query($con, "select firstclass, economic from payments 
	        left join vehicles on payments.vehicle_id=vehicles.id 
	        where origin_id='".$row['oid']."' and destination_id='".$row['did']."'");
			//echo $paymentquery;

		while ($payment = mysqli_fetch_array($paymentquery)) {
			$flag['10'] = $payment['firstclass'];
			$flag['firstclass'] = $payment['firstclass'];
			$flag['11'] = $payment['economic'];
			$flag['economic'] = $payment['economic'];
		}
	}
    

	$flag = array($flag);
	//array_push($flag, $payflag);
		print(json_encode($flag));
	}
	mysqli_close($con);
?>