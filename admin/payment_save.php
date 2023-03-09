<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$amount = $_POST['amount'];
	$status = $_POST['status'];
	
	$date=date("Y-m-d");
	if ($amount<>0)
	{
		mysqli_query($con,"INSERT INTO payment(amount,rid,payment_date) 
			VALUES('$amount','$id','$date')")or die(mysqli_error());  
	}
		

		mysqli_query($con,"UPDATE reservation SET balance=balance-'$amount',r_status='$status' where rid='$id'")or die(mysqli_error($con)); 

$query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=number_format($row['payable'],2);
        $ocassion=$row['r_ocassion'];
        // $team=$row['team_name'];
        $status=$row['r_status'];
        $email=$row['r_email'];
        $motif=$row['r_motif'];
        $time=$row['r_time'];
        $time=$row['r_time'];
        $type=$row['r_type'];
        $cid=$row['combo_id'];
        $combo=$row['combo_name'];
        $msg = "Thank you!";
        if ($status=='Approved'){
        	$msg="Please pay your remaining balance: $balance, before or after the event. Thank you!";

            $description = 'Staff Approved '.$first." ".$last.' Orders';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  

            $ch = curl_init();
            $parameters = array(
                'apikey' => 'a169dfe21fa8a66401d1b8bb71183e30', //Your API KEY
                'number' => $contact,
                'message' => $msg,
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

        }
        if ($status == 'Completed') {
            $description = 'Staff Completed '.$first." ".$last.' Orders';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  

            $ch = curl_init();
            $parameters = array(
                'apikey' => 'a169dfe21fa8a66401d1b8bb71183e30', //Your API KEY
                'number' => $contact,
                'message' => 'Your Reservation has been Completed, Thank you for choosing Momentum Catering Services!',
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
        }
        if ($status=='Cancelled'){
        	$msg=" Sorry!";
            $description = 'Staff Cancelled '.$first." ".$last.' Orders';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  

            $ch = curl_init();
            $parameters = array(
                'apikey' => 'a169dfe21fa8a66401d1b8bb71183e30', //Your API KEY
                'number' => $contact,
                'message' => 'Hi! This is Momentum Catering, your Reservation has been Cancelled',
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
        }


	ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "eugeneevangelista73@gmail.com";
    
    $to = $email;
    
    $subject = "Reservation Status";
    
    $message = "Dear $first $last,

    Your reservation is $status. $msg


    Thanks,

    Momentum Catering Catering Services
    	
    ";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    	
			echo "<script type='text/javascript'>alert('Successfully added new payment!');</script>";
			echo "<script>document.location='pending.php'</script>";   
	
	
?>