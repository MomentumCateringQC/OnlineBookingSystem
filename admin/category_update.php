<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $category = $_POST['category'];
	 
	 mysqli_query($con,"UPDATE category SET cat_name='$category' where cat_id='$id'")
	 or die(mysqli_error($con)); 

	 $description = 'Staff Update Category';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  

            
		echo "<script type='text/javascript'>alert('Successfully updated category details!');</script>";
		echo "<script>document.location='category.php'</script>";
	
} 

