<?php 
session_start();
include('../includes/dbcon.php');

$year1=$_SESSION['year1'];
	$query = mysqli_query($con,"select COUNT(*) as count,DATE_FORMAT(r_date,'%b') as month from reservation where YEAR(r_date)='$year1' and (r_status='Finished' or r_status='Approved') group by MONTH(r_date)") or die(mysqli_error($con));

	$category = array();


	$series1 = array();
	$series1['name'] = 'Approved and Finished';

	while($r = mysqli_fetch_array($query)) {
		

	    $category['name'][] =$r['month'];
	    $category['data'][] =$r['month'];
	    $series1['data'][] = $r['count'];

}

$result = array();
array_push($result,$category);
array_push($result,$series1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);

unset($_SESSION['year1']);
?> 
