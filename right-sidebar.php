<body>
<div class="col-md-3 col-lg-3 hideme"style="height:2vh;width:25%;">
</div>
<div class = "col-md-3 col-lg-3 inquiry hideme">
					<div class = "widget">
            <div class = "widget-head" style="background:#823E39;color:#fff">
              Check Reservation Status / Upload Receipt
            </div>
            <div class = "widget-content">
              <div class = "padd">
                <form class="form-horizontal" role="form" method="post" action="search.php">
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                    <input type ="text" name="rcode" class="form-control" placeholder="Reservation Code">
                                  </div>
                                </div>
                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-10">
                                    <button type="submit" name="search" class="btn btn-sm btn-success btn-block">Search</button>                                  
                                  </div>
                                </div>
                              </form>
            </div>
            </div>
          </div>  
          <?php 
          if (isset($_GET['rcode'])) { ?>
            <div class = "widget">
            <div class = "widget-head" style="background:#823E39;color:#fff">
              Edit Information/Upload Receipt
            </div>
            <div class = "widget-content">
              <div class = "padd">
                <form class="form-horizontal" role="form" method="post" action="updatereservation.php" enctype="multipart/form-data">
                  <input type ="hidden" name="r_code" class="form-control" value="<?php echo $rcode ?>">

                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                    <input type ="text" name="r_last" class="form-control" value="<?php echo $last ?>" placeholder="Lastname">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                    <input type ="text" name="r_first" class="form-control" value="<?php echo $first ?>" placeholder="Firstname">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                    <input type ="text" name="r_email" class="form-control" value="<?php echo $email ?>" placeholder="Email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                    <input type ="text" name="r_contact" class="form-control" rows="5" maxlength="11" pattern="\d{11}"  pattern="[0-9]+" value="<?php echo $contact ?>" placeholder="Contact">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                    <input type ="text" name="r_address" class="form-control" value="<?php echo $address ?>" placeholder="Address">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                    <input type ="file" name="proof" class="form-control">
                                  </div>
                                </div>
                <div class="form-group">
                                  <div class="col-lg-offset-1 col-lg-10">
                                    <button type="submit" class="btn btn-sm btn-success btn-block">Update</button>                                  
                                  </div>
                                  <br>
                                  <br>
                                  <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-1">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/gcashqr.png" height="300px" alt="">
                                </div>
                                </div>
                           
                                </div>
                              </form>
            </div>
            </div>
          </div> 
          <?php }
          ?>   
				</div>
        <div class="col-md-3 col-lg-3 hideme"style="height:5vh;width:25%;">
</div>
        <!-- <div class="col-md-3 col-lg-3 hideme">
              
              <div class="widget">
               
                <div class="widget-head"style="background:#E9BF6F;color:#000">
                  <div class="pull-left">Contact Information</div>
                   
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
              
                  <div class="padd">
                                
                             <div class="support-contact" >
                               
                                
                                <p><i class="fa fa-phone"></i>&nbsp; Phone<strong>:</strong> 0915 960 7869 </p>
                                <hr />
                                <p><i class="fa fa-envelope"></i>&nbsp; Email<strong>:</strong> momentumcatering01@gmail.com </p>
                                <hr />
                                <p><i class="fa fa-home"></i>&nbsp; Address<strong>:</strong> Blk 10 Lot 11 Malipaka St. Maligaya Park Subd. Bgy. Pasong Putik, Quezon City, Philippines </p>
                <hr />
        <p><i class="fa fa-facebook"></i>&nbsp; Facebook<strong>:</strong> facebook.com/MomentumCateringMC </p>
                <hr />              
                           
                            
                             </div>
                  </div>
                </div>

              </div> 

            </div> -->
</body>
      </div>  
    </div>
    </div>
   