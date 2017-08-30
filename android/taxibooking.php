<?php
    include'db.php';

    $destination = $_POST['destination'];
    $origin = $_POST['origin'];
    //$date = $_POST['date'];
    $vehicle = $_POST['vehicle'];
    $economic = $_POST['economic'];
    $organization = $_POST['organization'];
    $firstname = explode(',', str_replace(array('[',']'),'',$_POST['firstname']));
    $lastname = explode(',', str_replace(array('[',']'),'',$_POST['lastname']));
    $email = explode(',', str_replace(array('[',']'),'',$_POST['email']));
    $phone = explode(',', str_replace(array('[',']'),'',$_POST['phone']));
    $idno = explode(',', str_replace(array('[',']'),'',$_POST['idno']));
    $paymentmode = $_POST['paymentmode'];
    $seat = $_POST['capacity'];
    $amount = preg_replace("/[^0-9.]/", "",$_POST['amount']);   
    $departure = date('Y-m-d H:i:s');
    /*$newdate = strtotime($date.' '.$time);
    $datetime = date('Y-m-d H:i:s', $newdate);
    */
    $normal = preg_replace("/[^0-9.]/", "", $_POST['economic']);
    
    //$decoded = explode(',', str_replace(array('[[',']]'),'',$seat));
    //echo count($seat);
    //print_r($amount);

    //echo $seat;
    //exit();

    $veh = mysqli_query($con, "select vehiclenames.name,regno from vehicles left join vehiclenames on vehicles.vehiclename_id=vehiclenames.id where vehicles.id='".$vehicle."'");

    $rowv = mysqli_fetch_array($veh);

	$sel = mysqli_query($con, "select name,id from organizations where id='".$organization."'");

    $booking = mysqli_query($con, "select id from bookings where organization_id='".$organization."' order by id DESC");

	$row = mysqli_fetch_array($sel);

	$id = 0;

	if(mysqli_num_rows($booking) == 0){
    $id = 0;
	}else{
    $rowb = mysqli_fetch_array($booking);
    $id = $rowb['id'];
	}
	

    function initials($str,$id) {
    $ret = '';
    $bid = $id + 1;
    foreach (explode(' ', $str) as $word){
      if($word == null){
        $ret .= strtoupper($str[0]); 
      }else{
        $ret .= strtoupper($word[0]);
      }
      }
      $ticketnumber = '#' . $ret . date('ydm'). str_pad(($bid), 4, '0', STR_PAD_LEFT);
   
    return $ticketnumber;
    }
    
    

    require_once('PHPMailer-master/PHPMailerAutoload.php');

             //Create a new PHPMailer instance
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.upstridge.co.ke';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@upstridge.co.ke';                 // SMTP username
$mail->Password = 'upstridge2017';                           // SMTP password
$mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

for($i=0;$i<$seat;$i++){

$ticketno = initials($row['name'],$id+$i);

$message = "Hello ".$firstname[$i]." ".$lastname[$i].",<br> This is a confirmation that you have successfully booked ".$rowv['name']." on ".date('d-M-Y').".<br><br>Your booking details are:<br><table border='0'><tr><td><strong>Ticket number  :</strong></td><td>".$ticketno."</td></tr><tr><td><strong>First name :</strong></td><td>".$firstname[$i]."</td></tr><tr><td><strong>Last name :</strong></td><td>".$lastname[$i]."</td></tr><tr><td><strong>Phone number :</strong></td><td>".$phone[$i]."</td></tr><tr><td><strong>ID / Passport Number :</strong></td><td>".$idno[$i]."</td></tr><tr><td><strong>Amount :</strong></td><td>KES ".number_format($amount,2)."</td></tr><tr><td><strong>Payment Mode :</strong></td><td>".$paymentmode."</td></tr><tr><td><strong>Vehicle :</strong></td><td>".$rowv['regno'].' - '.$rowv['name']."</td></tr></table><br><br> For mor information contact us on...<a href='#'>upstridge.com</a>";

$mail->setFrom('info@upstridge.co.ke', 'Upstridge');
$mail->addAddress($email[$i], $firstname[$i]." ".$lastname[$i]);
$mail->Subject = "Booking Confirmation";
$mail->msgHTML($message);

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    echo "An error occured during booking...please try again!";
} else {
    echo mysqli_error($con);
    $query = mysqli_query($con, "insert into bookings(vehicle_id, organization_id, firstname, lastname, email, phone, id_number, ticketno, origin, destination, travel_date, amount,  normal_amount, status, date, mode_of_payment, type, created_at, updated_at) values ('".$vehicle."','".$organization."','".$firstname[$i]."','".$lastname[$i]."','".$email[$i]."','".$phone[$i]."','".$idno[$i]."','".$ticketno."','".$origin."','".$destination."','".$departure."','".$amount."','".$economic."','approved',NOW(),'".$paymentmode."','Taxi',NOW(),NOW())");
    
    if($query){
        echo "Booking Successful... Your booking Details have been sent to your email address";
    }else{
        echo "An error occured during booking...please try again!";
        echo mysqli_error($con);
    }
    echo "Booking Successful... Your booking Details have been sent to your email address";
}

$mail->clearAllRecipients();
      
}
	
	mysqli_close($con);
?>