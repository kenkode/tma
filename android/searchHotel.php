<?php
    include'db.php';
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $branch = $_POST['branch'];
    //$time = $_POST['time'];
    //$branch = "Nairobi";

    /*$destination = "Mombasa";
    $origin = "Nairobi";
    $time = "Night";*/

    /*$timerange1 = '';
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
    }*/


    /*$destination = "Mombasa";
    $origin = "Nairobi";
    $date = "2017-05-12";
    $time = "21:00";*/
    //$newdate = strtotime($date.' '.$time);
    //$datetime = date('Y-m-d H:i:s', $newdate);
    

	$query = mysqli_query($con, "select organizations.name, organizations.logo, branches.organization_id, branches.id,branches.name as branch from branches 
   left join organizations on branches.organization_id=organizations.id 
	 where branches.name='".$branch."'");
	
	if($query){
    while ($row = mysqli_fetch_array($query)) {
      $flag[]=$row;
    }
    print(json_encode($flag));
  }
  mysqli_close($con);
?>