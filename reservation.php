<?php include 'header.php';?>

<body>
  <br>
  <br>
  <br>
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>
	
		<div class = "content" >
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class = "col-md-9 col-lg-9">
					<div class="widget wgreen">
                
                <div class="widget-head"style="background:#823E39;color:#fff">
                  <div class="pull-left">Create Reservation</div>
                  <div class="widget-icons pull-right">
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd" style="background:#FBE6C2">

                    <br>
                    
                     <form class="form-horizontal" role="form" action="reservation_save.php" method="post">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label" style="font-size: 15px">First Name</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="First Name" name="first" required>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label" style="font-size: 15px">Last Name</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label" style="font-size: 15px">Address</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" rows="5" placeholder="Complete Address" name="address" required></textarea>
                                  </div>
                                </div>    

                                <div class="form-group">
                                  <label class="col-lg-2 control-label" style="font-size: 15px">Contact #</label>
                                  <div class="col-lg-5">
                                    <input type="tel" class="form-control"  maxlength="11" pattern="\d{11}"  pattern="[0-9]+" name="contact" required>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label" style="font-size: 15px">Email Address</label>
                                  <div class="col-lg-5">
                                    <input type="email" class="form-control" placeholder="Email Address" name="email">
                                  </div>
                                </div>
								 <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-5" style="font-size: 15px">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox1" value="option1" required> I agree to the <a href="#facilities" data-toggle="modal" style="font-size: 15px" >terms and condtion</a> of the Momentum Catering
                                    </label>
									</div>
									</div>


                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="reset" class="btn btn-sm btn-default" style="background:#823E39;color:#fff;font-size: 15px" >Clear</button>
                                    <button type="submit" class="btn btn-sm btn-primary" style="background:#823E39;color:#fff;font-size: 15px">Next</button>
                                    
                                  </div>
                                </div>
                              </form>
                               

                  </div>
                </div>
                
                  <div class="widget-foot"style="background:#823E39">
                
                  </div>
                  
              </div>	
              <br><br><br><br><br><br><br><br><br> 
    <br><br><br>	   <br>
				</div>
				<?php include('right-sidebar.php');?>
			
             
   
			
			</div>	
		</div>

    
						


<?php include 'script.php';?>
<script>
         $(function () {
         
         $(".select2").select2();
         

     })
    </script>
    
</body>
</html>



