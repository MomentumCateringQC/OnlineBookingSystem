<?php 

include('../includes/dbcon.php');
	
	$portfoliocategory_id = $_POST['portfoliocategory_id'];
	
	$image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../portfolio/".$image);
	
			mysqli_query($con,"INSERT INTO portfolio(portfoliocategory_id,image) 
				VALUES('$portfoliocategory_id','$image')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new Portfolio!');</script>";
				echo "<script>document.location='portfoliosubcategory.php'</script>";   
		
	
?>