<?php 

include('../includes/dbcon.php');
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	
			mysqli_query($con,"INSERT INTO faqs(title,description) 
				VALUES('$title','$description')")or die(mysqli_error());

			$description = 'Staff Add Faq`s';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new FAQ's!');</script>";
				echo "<script>document.location='faqs.php'</script>";   
		
	
?>