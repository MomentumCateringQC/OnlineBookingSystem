<?php include 'header.php';?>
  <?php include 'navbar.php';?>
  <br><br><br><br>
    <?php
    include('includes/dbcon.php');


    // $dir ="portfolio/"; 
      // if (is_dir($dir)){
         // if ($dh = opendir($dir)){
                 // while (($file = readdir($dh)) !== false){
                    // if($file=="." OR $file==".."){} else { 
              ?>   <!----eugene----->  

              <?php
              // ADD new function
               $query=mysqli_query($con,"SELECT * FROM packagescategory")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $packagescategory_id = $row['packagescategory_id'];
              ?>    
              <h1 style="margin: 12px; padding: 5px;color:#fff; text-align: center;font-family: Times New Roman, Times, serif;background:#823E39; font-size: 70px"><?php echo $row['category'] ?></h1>

              <?php
              $query2=mysqli_query($con,"SELECT * FROM packages WHERE packagescategory_id = '$packagescategory_id'")or die(mysqli_error($con));
      while ($row2=mysqli_fetch_array($query2)){
              ?>

              <img  style=" width: 600px;height: 1000px; margin: 16px; padding: 2px; position: center;" src="packages/<?php echo $row2['image'];?>">

                   <!-- <h4><?php echo $row['category'] ?></h4>
                         <img  style=" height: 250px; margin: 12px; padding: 5px; position: relative;" src="portfolio/<?php $row['image'];?>"> -->
                      <?php } ?>
                       <?php } ?>
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
             <?php
             
             
              // }
             // }
         // closedir($dh);
         // }
         
      // }
       ?>







