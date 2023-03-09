<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$category = $_POST['category'];
	
			mysqli_query($con,"UPDATE portfoliocategory SET category = '$category' WHERE portfoliocategory_id = '$id' ")or die(mysqli_error());  

			$description = 'Staff Update Portfolio Category';
            mysqli_query($con,"INSERT INTO audittrail (description) 
            VALUES('$description')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Update category!');</script>";
				echo "<script>document.location='portfoliocategory.php'</script>";   
		
	
?>