<?php
    include'db.php';

    /*$destination = $_POST['destination'];
    $origin = $_POST['origin'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    $organization_id = $_POST['organization_id'];*/

    $destination = "Mombasa";
    $origin = "Nairobi";
    $date = "2017-08-19";
    $time = "21:00";
    $type= "SGR";
    $organization_id = 2;
    $data;

    $arr = array();

    $booked = array();
    $seat = array();

    $newdate = strtotime($date.' '.$time);
    $datetime = date('Y-m-d H:i:s', $newdate);

    /*$seatquery = mysqli_query($con,"select * from seatnamings where organization_id='".$organization_id."'");

    if($seatquery){
        $i = 1;
        while ($r = mysqli_fetch_array($seatquery)) {
            $flag[]=$r;
        }
        $data['seat'] = $flag;
    }*/

    $seatquery = mysqli_query($con,"select * from seatnamings where organization_id='".$organization_id."'");
	
	if($seatquery){
		$i = 1;
		while ($row = mysqli_fetch_array($seatquery)) {

            $query = mysqli_query($con,"select seatno from bookings where origin='".$origin."' and destination='".$destination."' and travel_date='".$datetime."' and type='".$type."' and seatno='".$row["seatno"]."'");

            if(mysqli_num_rows($query) > 0){
            //$booked[0+$i] = $row['seatno'];
            $booked['seatno'] = $row['seatno'];
            //$booked[1+$i] = $row['vip'];
            $booked['vip'] = $row['vip'];
            //$booked[2+$i] = $row['business'];
            $booked['business'] = $row['business'];
            //$booked[3+$i] = $row['economy'];
            $booked['economy'] = $row['economy'];
            //$booked[4+$i] = "booked";
            $booked['status'] = "booked";
            $flag[] = $booked;
            }else{
            //$booked[0+$i] = $row['seatno'];
            $booked['seatno'] = $row['seatno'];
            //$booked[1+$i] = $row['vip'];
            $booked['vip'] = $row['vip'];
            //$booked[2+$i] = $row['business'];
            $booked['business'] = $row['business'];
            //$booked[3+$i] = $row['economy'];
            $booked['economy'] = $row['economy'];
            //$booked[4+$i] = "available";
            $booked['status'] = "available";
            $flag[] = $booked; 
            }

			
			$i++;
		}
        //$booked = array($booked);
		//$booked[$i] = mysqli_num_rows($query);
		//$booked['total'] = mysqli_num_rows($query);
		//$data['seats'] = $flag;
		print(json_encode($flag));
	}
    
	mysqli_close($con);
?>