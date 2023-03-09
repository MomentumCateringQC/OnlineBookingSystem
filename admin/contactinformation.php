<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en" style="background:#823E39">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">

  <title>Combo Meals - <?php include('../includes/title.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
    
      <div class="navbar-header" style="background:#E9BF6F">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
    
      <a href="index.html" class="navbar-brand hidden-lg">Momentum Catering</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>





<div class="content" style="margin-top:10px;background: #823E39">

    <?php include('../includes/sidebar.php');?>
    
    <div class="mainbar" style="background:#E9BF6F">

      <div class="page-head" style="background:#E9BF6F">
        <h2 class="pull-left"><i class="fa fa-home" style="color:#000000"></i>
        <h2 style="color:#000000;"> Dashboard 
          </h2>

        

        <div class="clearfix"></div>

      </div>

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                
<?php
include('../includes/dbcon.php');
       
?>  

    
              <div class="col-md-4">
              <div class="widget">
            
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff"></div>
                  <div class="widget-icons pull-right">
                   
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content referrer">
                
              
<?php

    $query1=mysqli_query($con,"select * from contactinformation")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query1);
        
        
?>                        
                   <form method="POST" action="contactinformation_update.php">
                     <div class="row" style="padding: 10px;">
                      <div class="form-group">
                          <label class="control-label col-lg-3" for="title">Contact</label>
                          <div class="col-lg-12"> 
                            <input type="text" class="form-control" name="contact" value="<?php echo $row['contact'] ?>" id="title">
                          </div>
                      </div>  
                      <div class="form-group">
                          <label class="control-label col-lg-3" for="title">Email</label>
                          <div class="col-lg-12"> 
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" id="title">
                          </div>
                      </div>  
                      <div class="form-group">
                          <label class="control-label col-lg-3" for="title">Address</label>
                          <div class="col-lg-12"> 
                            <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>" id="title">
                          </div>
                      </div>  
                      <div class="form-group">
                          <label class="control-label col-lg-3" for="title">Facebook</label>
                          <div class="col-lg-12"> 
                            <input type="text" class="form-control" name="facebook" value="<?php echo $row['facebook'] ?>" id="title">
                          </div>
                      </div>  
                      <div class="form-group" style="">
                          <div class="col-lg-12" style="text-align: right;"> 
                            <button style = "background: #823E39;margin-top: 20px;" type="submit" name="update" class="btn btn-sm btn-primary">Save</button>
                          </div>
                      </div>  

                   </div>
                   </form>
                           
                    
               

                  <div class="widget-foot" style = "background: #823E39">
                  </div>
                </div>
              </div>

            </div>
      
         
            </div>
          </div>
        </div>
      </div>
      <div id="dynamicInput">



    </div>


   <div class="clearfix"></div>

</div>





<?php include('../includes/js.php');?>  
<script>
         $(function () {
         
         $(".select2").select2();
         

     })
    </script>
    
  
</body>
</html>