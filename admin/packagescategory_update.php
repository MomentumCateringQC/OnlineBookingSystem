<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$category = $_POST['category'];
	
			mysqli_query($con,"UPDATE packagescategory SET category = '$category' WHERE packagescategory_id = '$id' ")or die(mysqli_error());  

			$description = 'Staff Update Packages Category';
            mysqli_query($con,"INSERT INTO audittrail (description) 
            VALUES('$description')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Update category!');</script>";
				echo "<script>document.location='packagescategory.php'</script>";   
		
	
?>