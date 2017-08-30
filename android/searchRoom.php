<?php
    include'db.php';
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    $branch = $_POST['branch'];
    //$time = $_POST['time'];
    //$branch = 4;

	$query = mysqli_query($con, "select rooms.id, rooms.roomtype_id, roomtypes.name as name, rooms.organization_id, rooms.image, rooms.adults, rooms.children,rooms.room_count,pricings.mon,pricings.tue,pricings.wen,pricings.thur,pricings.fri,pricings.sat,pricings.sun from rooms
   left join roomtypes on rooms.roomtype_id = roomtypes.id
   left join organizations on rooms.organization_id=organizations.id 
   left join (select COALESCE(mon,0) as mon,COALESCE(tue,0) as tue,COALESCE(wen,0) as wen,COALESCE(thur,0) as thur,COALESCE(fri,0) as fri,COALESCE(sat,0) as sat,COALESCE(sun,0) as sun,branch_id,roomtype_id from pricings where branch_id='".$branch."') as pricings on roomtypes.id=pricings.roomtype_id
	 where rooms.branch_id='".$branch."'");


  if($query){
    while ($row = mysqli_fetch_array($query)) {
      $flag[]=$row;
    }
    print(json_encode($flag));
  }else{
    echo mysqli_error($con);
  }
  mysqli_close($con);
?>