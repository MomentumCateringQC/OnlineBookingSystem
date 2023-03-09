<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	
			mysqli_query($con,"DELETE FROM packages WHERE packages_id = '$id' ")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Delete Packages!');</script>";
				echo "<script>document.location='packages.php'</script>";   
		
	
?>