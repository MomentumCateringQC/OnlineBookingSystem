<?php 

include('../includes/dbcon.php');

	$id = $_POST['id'];
	$portfoliocategory_id = $_POST['portfoliocategory_id'];

	$image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../portfolio/".$image);

    if ($image == '') {

    	mysqli_query($con,"UPDATE portfolio SET portfoliocategory_id = '$portfoliocategory_id' WHERE id = '$id' ")or die(mysqli_error());  
		echo "<script type='text/javascript'>alert('Successfully Update category!');</script>";
		echo "<script>document.location='portfoliosubcategory.php'</script>";   
    	
    }else {

    	mysqli_query($con,"UPDATE portfolio SET portfoliocategory_id = '$portfoliocategory_id', image = '$image' WHERE id = '$id' ")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully Update category!');</script>";
				echo "<script>document.location='portfoliosubcategory.php'</script>";   

    }

			
		
	
?>