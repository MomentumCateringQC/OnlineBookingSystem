<?php 

include('../includes/dbcon.php');

	$id = $_POST['id'];
	$packagescategory_id = $_POST['packagescategory_id'];

	$image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../packages/".$image);

    if ($image == '') {

    	
		echo "<script type='text/javascript'>alert('Successfully Update packages!');</script>";
		echo "<script>document.location='packages.php'</script>";   
    	
    }else {

    	mysqli_query($con,"UPDATE packages SET packagescategory_id = '$packagescategory_id' , image = '$image' WHERE packages_id = '$id' ")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Update packages!');</script>";
				echo "<script>document.location='packages.php'</script>";   

    }

			
		
	
?>