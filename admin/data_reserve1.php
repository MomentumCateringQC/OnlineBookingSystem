<?php 
session_start();
include('../includes/dbcon.php');

$year1=date("Y");
	$query = mysqli_query($con,"SELECT COUNT(*) as count,DATE_FORMAT(date_reserved,'%b') as month from reservation where YEAR(date_reserved)='$year1' and r_status='Completed' or r_status='Approved ' group by MONTH(date_reserved)") or die(mysqli_error($con));

	$category = array();


	$series1 = array();
	$series1['name'] = 'Approved and Completed';

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
?> 
