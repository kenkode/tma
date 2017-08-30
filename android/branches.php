<?php
    include'db.php';

	$query = mysqli_query($con, "select Distinct(name) from branches");
	
	if($query){
		while ($row = mysqli_fetch_array($query)) {
			$flag[]=$row;
		}
		print(json_encode($flag));
	}
	mysqli_close($con);
?>