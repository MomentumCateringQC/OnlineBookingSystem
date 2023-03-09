<?php include 'header.php';?>

<body>
	<br>
  <br>
  <br>
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>
	
		<div class = "content">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class = "col-md-8 col-lg-8">
					<div class = "widget">
						<div class = "widget-head"style="background:#823E39;color:#fff">
							Find us at
						</div>
						<div class = "widget-content">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d964.6258146042263!2d121.05428888280336!3d14.740653560847358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b041c150dd23%3A0x5954963b4c803464!2sMalipaka%20Street%2C%20Novaliches%2C%20Quezon%20City%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1673334893090!5m2!1sen!2sph" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>				
				</div>
				<div class = "col-md-4 col-lg-4">
					<div class = "widget">
						<div class = "widget-head"style="background:#823E39;color:#fff">
							Message us
						</div>
						<div class = "widget-content" style="background:#FBE6C2">
							<div class = "padd">
								<form class="form-horizontal" action = "add_message.php" method="post">                              
                                <div class="form-group">
                                  <label class="col-lg-3 control-label" style="font-size: 15px">Fullname</label>
                                  <div class="col-lg-8">
                                    <input name = "fullname" type="text" class="form-control" placeholder="Please type your name" required >
                                  </div>
                                </div>                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label" style="font-size: 15px">Email</label>
                                  <div class="col-lg-8">
                                    <input type="email"  name = "email" class="form-control" placeholder="Please type your email" required>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label" style="font-size: 15px">Contact #</label>
                                  <div class="col-lg-8">
                                    <input type="contnum"  name = "contnum" class="form-control" rows="5" maxlength="11" pattern="\d{11}"  pattern="[0-9]+" placeholder="Please type your mobile number" required>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label" style="font-size: 15px">Subject</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "subject" class="form-control" placeholder="Subject" required>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label" style="font-size: 15px">Message</label>
                                  <div class="col-lg-8">
                                    <textarea name = "message" class="form-control" rows="5" maxlength="150" resize="none" placeholder="Type your Message here....."required></textarea>
                                  </div>
                                </div>
								<div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-8">
                                    <button  class="btn btn-sm btn-success btn-block" style="font-size: 15px">Send</button>                                  
                                  </div>
								  
								  <br>
								  <br>
								  <br>
								  <br>
								   
              <div class="widget">
               
                <div class="widget-head"style="background:#823E39;color:#fff">
                  <div class="pull-left">Contact Information</div>
                   
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content" style="background:#FBE6C2;color:#000">
                
                  <div class="padd">
                             
                             <div class="support-contact" style="font-size: 15px">
                                <?php
                                include('includes/dbcon.php');
 $query1=mysqli_query($con,"SELECT * from contactinformation WHERE id = 1")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query1);
                                ?>
                                
                                <p><i class="fa fa-phone"></i>&nbsp; Phone<strong>:</strong> <?php echo $row['contact'] ?></p>
                                <hr />
                                <p><i class="fa fa-envelope"></i>&nbsp; Email<strong>:</strong> <?php echo $row['email'] ?> </p>
                                <hr />
                                <p><i class="fa fa-home"></i>&nbsp; Address<strong>:</strong> <?php echo $row['address'] ?> </p>
                <hr />
        <p><i class="fa fa-facebook"></i>&nbsp; Facebook<strong>:</strong> <?php echo $row['facebook'] ?> </p>
                <hr />       
						</div></div></div></div>	
                                </div>
                              </form>

						</div>
						</div>
							
				</div>	
	
				
					</div>
				</div>
			</div>	
		</div>										
				</div>
			</div>
		</div>
			</div>
			
			<br>
			<br>
			<br>
			<br>
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
</body>
</html>



