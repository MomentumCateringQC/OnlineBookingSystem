<?php 

include('../includes/dbcon.php');
	
	$packagescategory_id = $_POST['packagescategory_id'];
	$image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../packages/".$image);
	
			mysqli_query($con,"INSERT INTO packages(packagescategory_id,image)VALUES('$packagescategory_id','$image')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new Packages!');</script>";
				echo "<script>document.location='packages.php'</script>";   
		
	
?>