<?php

	//$con = mysqli_connect("localhost","upstridg_tma","p!Z.PQ*y4nqE","upstridg_tma");

    $con = mysqli_connect("localhost","root","","tma");
	
	if (mysqli_connect_errno())
    {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>