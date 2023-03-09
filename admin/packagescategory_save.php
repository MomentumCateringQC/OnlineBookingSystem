<?php 

include('../includes/dbcon.php');
	
	$category = $_POST['category'];
	
	$result = mysqli_query($con,"SELECT category FROM packagescategory where category='$category'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO packagescategory(category) 
				VALUES('$category')")or die(mysqli_error());  

			$description = 'Staff Add New Packages Category';
            mysqli_query($con,"INSERT INTO audittrail (description) 
            VALUES('$description')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
				echo "<script>document.location='packagescategory.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Category already added!');</script>";
				echo "<script>document.location='packagescategory.php'</script>";  
		}
	
?>