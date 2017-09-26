<?php
    include'db.php';
    $province = $_POST["province"];

	$query = mysqli_query($con, "select routes.name from routes left join organizations on routes.organization_id=organizations.id where $province = 1");
	
	if($query){
		while ($row = mysqli_fetch_array($query)) {
			$flag[]=$row;
		}
		print(json_encode($flag));
	}
	mysqli_close($con);
?>