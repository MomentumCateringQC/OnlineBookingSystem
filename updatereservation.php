<?php 
session_start();
include('includes/dbcon.php');
	

	$r_code = $_POST['r_code'];
	$r_last = $_POST['r_last'];
	$r_first = $_POST['r_first'];
	$r_email = $_POST['r_email'];
	$r_contact = $_POST['r_contact'];
	$r_address = $_POST['r_address'];
	

	$proof = $_FILES['proof']['name'];
    move_uploaded_file($_FILES['proof']['tmp_name'], "images/".$proof);
	
	if ($proof == '') {
		mysqli_query($con,"UPDATE reservation SET r_code='$r_code', r_last='$r_last', r_first='$r_first', r_email='$r_email', r_contact='$r_contact', r_address='$r_address' where r_code='$r_code'")
	 or die(mysqli_error($con)); 
	}else{
		mysqli_query($con,"UPDATE reservation SET r_code='$r_code', r_last='$r_last', r_first='$r_first', r_email='$r_email', r_contact='$r_contact', r_address='$r_address', proof='$proof' where r_code='$r_code'")
	 or die(mysqli_error($con)); 
	}
    	 

			echo "<script>document.location='reservation_status.php?rcode=".$r_code."'</script>";   
	
	
?>