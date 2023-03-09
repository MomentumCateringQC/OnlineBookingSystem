<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	
			mysqli_query($con,"DELETE FROM portfolio WHERE id = '$id' ")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Delete Portfolio!');</script>";
				echo "<script>document.location='portfoliosubcategory.php'</script>";   
		
	
?>