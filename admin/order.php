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
  
  <title>Menu Order - <?php include('../includes/title.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu Order</span>
      </button>
      
      <a href="index.html" class="navbar-brand hidden-lg">Momentum Catering</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>





<div class="content" style="margin-top:10px;background:#823E39">


    <?php include('../includes/sidebar.php');?>


    <div class="mainbar" style="background:#E9BF6F">
      

      <div class="page-head" style="background:#E9BF6F">
        <h2 class="pull-left"><i class="fa fa-home" style="color:#000000"></i></h2>
        <h2 style="color:#000000;"> Dashboard </h2>

        

        <div class="clearfix"></div>

      </div>

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                
<?php
include('../includes/dbcon.php');
    $today=date("Y-m-d");
    $query=mysqli_query($con,"select * from reservation where r_status='Approved' and r_date>='$today' order by r_date desc")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        
        $date=$row['r_date'];
        $time=$row['r_time'];
        $rid=$row['rid'];
        $cid=$row['combo_id'];
?>  
 

              <div class="col-md-4">
              <div class="widget">
             
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff"><?php echo date("M d, Y",strtotime($date))." ".date("h:i a",strtotime($time));?></div>
                  <div class="widget-icons pull-right">
                    
                
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content referrer">
           
                  <table class="table table-striped table-bordered table-hover">
                    <tbody>
<?php

    $query1=mysqli_query($con,"select * from combo_details natural join menu where combo_id='$cid'")or die(mysqli_error($con));
      while ($row1=mysqli_fetch_array($query1)){
        $nop=$row['pax'];
        $menu=$row1['menu_name'];
        
?>                        
                    <tr>
                      <td><?php echo "(".$nop.")  ".$menu;?></td>
                    </tr> 
                   
                
<?php }?>                    
                    
                  </tbody></table>

                  <div class="widget-foot" style = "background: #823E39">
                  </div>
                </div>
              </div>

            </div>
     
            <?php }?>  
            </div>
          </div>
        </div>
      </div>

    


    </div>

   <div class="clearfix"></div>

</div>

<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<?php include('../includes/js.php');?>  
<script>
         $(function () {
        
         $(".select2").select2();

     })
    </script>
</body>
</html>