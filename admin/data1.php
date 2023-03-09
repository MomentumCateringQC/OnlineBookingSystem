<?php 
session_start();
include('../includes/dbcon.php');
	
	$year=date("Y");

	$query = mysqli_query($con,"select *,SUM(amount) as amount,DATE_FORMAT(payment_date,'%b') as month from payment where YEAR(payment_date)='$year' group by MONTH(payment_date)") or die(mysqli_error($con));

	$category = array();
	

	$series1 = array();
	$series1['name'] = 'Monthly Sales';

	while($r = mysqli_fetch_array($query)) {
		
	
	    $category['name'][] =$r['month'];
	    $category['data'][] =$r['month'];
	    $series1['data'][] = $r['amount'];

}

$result = array();
array_push($result,$category);
array_push($result,$series1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
?> 
