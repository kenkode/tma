<?php
    include'db.php';

    $type = $_POST['type'];
	$query = mysqli_query($con, "select Distinct(name) from routes where type='".$type."'");
	
	if($query){
		while ($row = mysqli_fetch_array($query)) {
			$flag[]=$row;
		}
		print(json_encode($flag));
	}
	mysqli_close($con);
?>