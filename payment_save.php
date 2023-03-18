<?php 
session_start();
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$mode = $_POST['mode'];

		mysqli_query($con,"UPDATE reservation SET modeofpayment='$mode',r_status='pending' where rid='$id'")or die(mysqli_error($con)); 

$query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $email=$row['r_email'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=$row['payable'];
        $ocassion=$row['r_ocassion'];
        $status=$row['r_status'];
        $motif=$row['r_motif'];
        $time=$row['r_time'];
        $time=$row['r_time'];
        $type=$row['r_type'];
        $cid=$row['combo_id'];
        $combo=$row['combo_name'];


    $ch = curl_init();
    $parameters = array(
        'apikey' => '', //Your API KEY
        'number' => $contact,
        'message' => 'Thank you for your Choosing Momentum Catering. Please pay 50% Downpayment before we confirm your reservation',
        'sendername' => 'SEMAPHORE'
    );
    curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
    curl_setopt( $ch, CURLOPT_POST, 1 );

    //Send the parameters set above with the request
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

    // Receive response from server
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close ($ch);

    ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "momentumcatering@gmail.com";
    
    $to = $email;
    
    $subject = "Reservation Details";
    
    $message = "Dear $first $last, Below are your reservation details to Momentum Catering

    	Reservation Code: $rcode
    	Event Date: $date
    	Event Time: $time
    	Venue: $venue
    	Motif: $motif
    	Ocassion: $ocassion
    	Total Payable: $payable
    	Package: $combo
    	
    ";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    
    echo "<script>
		alert('Check Your Email Inbox for the details');		
	</script>";
			
			echo "<script>document.location='summary.php'</script>";   
	
?>
