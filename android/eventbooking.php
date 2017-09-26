<?php
    include'db.php';

    $eventid = $_POST['event'];
    $organization = $_POST['organization'];
    $firstname = explode(',', str_replace(array('[',']'),'',$_POST['firstname']));
    $lastname = explode(',', str_replace(array('[',']'),'',$_POST['lastname']));
    $email = explode(',', str_replace(array('[',']'),'',$_POST['email']));
    $phone = explode(',', str_replace(array('[',']'),'',$_POST['phone']));
    $idno = explode(',', str_replace(array('[',']'),'',$_POST['idno']));
    $slots = $_POST['slots'];
    $paymentmode = $_POST['paymentmode'];
    $amount = preg_replace("/[^0-9.]/", "", explode(',', str_replace(array('[',']'),'',$_POST['amount'])));
    $vip = $_POST['vip'];
    $normal = $_POST['economic'];
    $children = $_POST['children'];
    $adult = $_POST['adults'];
    $childrencount = $_POST['child'];
       

    //$decoded = explode(',', str_replace(array('[[',']]'),'',$seat));
    //echo count($seat);
    //print_r($amount);

    //echo $slots;
    //exit();

    $event = mysqli_query($con, "select * from events where id='".$eventid."'");

    $rowe = mysqli_fetch_array($event);

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

for($i=0;$i<$slots;$i++){

$ticketno = initials($row['name'],$id+$i);

$message = "Hello ".$firstname[$i]." ".$lastname[$i].",<br> This is a confirmation that you have successfully booked ".$rowe['name']." on ".date('d-M-Y').".<br><br>Your booking details are:<br><table border='0'><tr><td><strong>Ticket number  :</strong></td><td>".$ticketno."</td></tr><tr><td><strong>First name :</strong></td><td>".$firstname[$i]."</td></tr><tr><td><strong>Last name :</strong></td><td>".$lastname[$i]."</td></tr><tr><td><strong>Phone number :</strong></td><td>".$phone[$i]."</td></tr><tr><td><strong>ID / Passport Number :</strong></td><td>".$idno[$i]."</td></tr><tr><td><strong>Amount :</strong></td><td>KES ".number_format($amount[$i],2)."</td></tr><tr><td><strong>Payment Mode :</strong></td><td>".$paymentmode."</td></tr></table><br><br> For mor information contact us on...<a href='#'>upstridge.com</a>";

$mail->setFrom('info@upstridge.co.ke', 'Upstridge');
$mail->addAddress($email[$i], $firstname[$i]." ".$lastname[$i]);
$mail->Subject = "Booking Confirmation";
$mail->msgHTML($message);

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    //echo "An error occured during booking...please try again!";
} else {
    $query = mysqli_query($con, "insert into bookings(event_id, organization_id, firstname, lastname, email, phone, id_number, ticketno, travel_date, amount, vip_amount, normal_amount, children_amount, adult_number, children_number, status, date, mode_of_payment, type, created_at, updated_at) values ('".$eventid."','".$organization."','".$firstname[$i]."','".$lastname[$i]."','".$email[$i]."','".$phone[$i]."','".$idno[$i]."','".$ticketno."','".$rowe['date']."','".$amount[$i]."','".$vip."','".$normal."','".$children."','".$adult."','".$childrencount."','approved',NOW(),'".$paymentmode."','Events',NOW(),NOW())");
    
    if($query){
        echo "Booking Successful... Your booking Details have been sent to your email address";
    }else{
        echo "An error occured during booking...please try again!";
        //echo mysqli_error($con);
    }
}
      
}
	
	mysqli_close($con);
?>