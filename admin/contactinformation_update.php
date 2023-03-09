<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 



	 $contact = $_POST['contact'];
	 $email = $_POST['email'];
	 $address = $_POST['address'];
	 $facebook = $_POST['facebook'];
	 

	 mysqli_query($con,"UPDATE contactinformation SET contact='$contact', email='$email', address='$address', facebook='$facebook' where id=1")
	 or die(mysqli_error($con)); 
 	

		echo "<script type='text/javascript'>alert('Successfully updated Contact Information Details!');</script>";
		echo "<script>document.location='contactinformation.php'</script>";
	
} 

