<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	
			mysqli_query($con,"UPDATE faqs SET title = '$title', description = '$description' WHERE id = '$id' ")or die(mysqli_error()); 

			$description = 'Staff Update Faq`s';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Update FAQ's!');</script>";
				echo "<script>document.location='faqs.php'</script>";   
		
	
?>