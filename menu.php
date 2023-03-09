<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>

<body>
<br>
<br>
<br>
<?php include 'navbar.php';?>
<?php include 'menu-tab.php';?>


<div class="content" style="background-image: url('img/back.png');">

  	

	    <div class="matter" style="background-image: url('img/back.png');">
        <div class="container">
          <div class="row" >
            <div class="col-md-12" style="background:#FBE6C2">
            <div class="widget" style="background:#FBE6C2">
                <div class="widget-head"style="background:#823E39">
                  <div class="pull-left"style="color:#fff">Menu</div>
                  <div class="widget-icons pull-right">
          
                  </div>  
                  <div class="clearfix"></div>
                </div>
<?php
	include('includes/dbcon.php');
	$query=mysqli_query($con,"select * from subcategory")or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($query)){
			$subcat_id=$row['subcat_id'];
			$subcat_name=$row['subcat_name'];
?>   

                <div class="col-md-6">
                  <div class="widget-content">
                  <div class="padd">
                    <h3><?php echo $subcat_name;?></h3>
                    <div class="gallery">
                      
<?php
            
              $querym=mysqli_query($con,"select * from menu natural join subcategory where subcat_id='$subcat_id' order by menu_name")or die(mysqli_error($con));
              while ($rowm=mysqli_fetch_array($querym)){
                $mid=$rowm['menu_id'];
                $menu=$rowm['menu_name'];
              
                $subcat=$rowm['subcat_name'];
                $desc=$rowm['menu_desc'];
               
                $pic=$rowm['menu_pic'];
?>                        
                      <a href="images/<?php echo $pic;?>" class="prettyPhoto[pp_gal]" title="<?php echo $menu.""?>" alt="<?php echo $menu." - P"?>">
                          <img src="images/<?php echo $pic;?>" alt="<?php echo $menu." ";?>" width="300px">
                          
                      </a>
                     <?php }?>
                    </div>

                  </div>
                  <div class="widget-foot"style="background:#823E39">
                   
                  </div>
                  <br><br>
                </div>
                </div>
<?php }?>                
              </div>  
              
            </div>
			</div>
      	
		</div>

    

    <style>




div.ralph img {
  width: 25%;
  height: auto;
  float: left;
  width: 33.33%;
  padding: 5px;
}
.row::after {
  content: "";
  clear: both;
  display: table;
}

div.desc {
  padding: 15px;
  text-align: center;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 200px;
}
</style>
<div class="row">

<br><br><br><br><br>
</div>
</div>
<br><br><br><br><br>
</div>
    
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
<script>
         $(function () {
         
         $(".select2").select2();
         

     })
    </script>
</body>
</html>