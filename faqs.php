<?php include 'header.php';?>

<body>
	<?php include 'navbar.php';?>
    <br><br><br>
<div class="container" style="background-color:;padding: 0px;">
	<!-- <img src="img/mcfaqs.png" alt="mc image" width="1400"  position="sticky"> -->
	<div style="background-color:;height: 20px;"></div>
	<div class="row" style="margin-top: 70px;padding: 30px;">
	 <?php

	 include('includes/dbcon.php');
              $query=mysqli_query($con,"SELECT * FROM faqs")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
              ?>
	
		<div class="col-md-4" style="margin-top: 25px;">
			<div class="card">
				<div class="header-title" style="background-color: #fff;">
					<h2 style="font-weight: bold;color: #000;text-align: center;"><?php echo $row['title'] ?></h2>
				</div>
				<div class="card-body text-center" style="background-color: #66332f;padding: 20px 10px;">
					<h2 style="font-weight: bold;color: #fff;overflow-wrap: break-word;"><?php echo $row['description'] ?></h2>
				</div>
			</div>
		</div>
	
<?php } ?>
</div>
	<div>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63bd078147425128790c97ef/1gmd6akod';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->