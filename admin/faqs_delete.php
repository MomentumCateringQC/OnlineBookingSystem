<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	
			mysqli_query($con,"DELETE FROM faqs WHERE id = '$id' ")or die(mysqli_error());  

			$description = 'Staff Delete Faq`s';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Delete FAQ's!');</script>";
				echo "<script>document.location='faqs.php'</script>";   
		
	
?>