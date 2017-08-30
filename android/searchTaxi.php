<?php
    include'db.php';
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    $flag = array();
   

	$query = mysqli_query($con, "select vehiclenames.name, vehiclenames.logo, vehicles.capacity, vehicles.id, vehicles.organization_id from vehicles  
	    left join vehiclenames on vehicles.vehiclename_id=vehiclenames.id 
	    where vehiclenames.type='Taxi'");
	
	if($query){
		while ($row = mysqli_fetch_array($query)) {
			$flag = $row;
			$paymentquery = mysqli_query($con, "select economic from payments 
	        left join vehicles on payments.vehicle_id=vehicles.id");
			//echo $paymentquery;

		while ($payment = mysqli_fetch_array($paymentquery)) {
			$flag['5'] = $payment['economic'];
			$flag['economic'] = $payment['economic'];
		}
	}
	$flag = array($flag);
	//array_push($flag, $payflag);
		print(json_encode($flag));
	}
	mysqli_close($con);
?>