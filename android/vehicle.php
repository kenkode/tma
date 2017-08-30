<?php
    include'db.php';
    $destination = $_POST['destination'];
    $province = $_POST['province'];

	$query = mysqli_query($con, "select vehiclenames.logo,vehiclenames.name,vehiclenames.id from vehiclenames left join organizations on vehiclenames.organization_id=organizations.id left join routes on organizations.id=routes.organization_id where routes.name = '".$destination."' and $province = 1");
	
	if($query){
		while ($row = mysqli_fetch_array($query)) {
			$flag[]=$row;
		}
		print(json_encode($flag));
	}
	mysqli_close($con);
?>