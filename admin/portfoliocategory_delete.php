<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	
			mysqli_query($con,"DELETE FROM portfoliocategory WHERE portfoliocategory_id = '$id' ")or die(mysqli_error());  

			$description = 'Staff Delete Portfolio Category';
            mysqli_query($con,"INSERT INTO audittrail (description) 
            VALUES('$description')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Delete category!');</script>";
				echo "<script>document.location='portfoliocategory.php'</script>";   
		
	
?>