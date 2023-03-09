<?php
include 'includes/dbcon.php';
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contnum = $_POST['contnum'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date = date("Y-m-d H:i:s");


        mysqli_query($con,"INSERT INTO message(fullname,email,contnum,subject,message,date) 
            VALUES('$fullname','$email',$contnum,'$subject','$message','$date')")or die(mysqli_error());
            echo "<script type='text/javascript'>alert('Successfully Sent Message we will email you for our response thank you!');</script>";
            echo "<script>document.location='contact.php'</script>";

?>