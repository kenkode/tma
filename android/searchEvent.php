<?php
    include'db.php';

  //echo date('Y-m-d H:i:s');
  $query = mysqli_query($con, "select * from events where date >= '".date('Y-m-d H:i:s')."'");
  
  if($query){
    while ($row = mysqli_fetch_array($query)) {
      $flag[]=$row;
    }
    print(json_encode($flag));
  }
  mysqli_close($con);
?>