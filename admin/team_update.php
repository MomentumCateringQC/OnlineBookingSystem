<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	$id = $_POST['id'];
	$team = $_POST['team'];
	
	 mysqli_query($con,"UPDATE team SET team_name='$team' where team_id='$id'")
	 or die(mysqli_error($con));

	 $description = 'Staff Update Teams';
            mysqli_query($con,"INSERT INTO audittrail (description) 
            VALUES('$description')")or die(mysqli_error()); 

		echo "<script type='text/javascript'>alert('Successfully updated team details!');</script>";
		echo "<script>document.location='teams.php'</script>";
	
} 

