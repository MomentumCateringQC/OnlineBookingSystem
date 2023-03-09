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
          <a href="#addModal" class="btn btn-info" style = "background: #823E39" data-toggle="modal">Add New Combo Meals</a>
        </h2>

        

        <div class="clearfix"></div>

      </div>

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from combo order by combo_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['combo_id'];
        $name=$row['combo_name'];
        $price=$row['combo_price'];
       
?>  

<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete Combo Meals</h4>
            </div>
            <div class="modal-body" style="height:140px">
         
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete <?php echo $name;?>?
                    </div>                     
            
                  
                      
                        <button type="submit" class="btn btn-sm btn-primary" name="del">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                      
                 
              </form>
        
            </div>
           
        </div>
    </div>
</div>

<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Update Combo Meals</h4>
            </div>
            <div class="modal-body" style="height:300px">
         
              <form class="form-horizontal" method="post" action="combo_update.php" enctype='multipart/form-data'>
            
                  <input type="hidden" name="id" value="<?php echo $id;?>">
               
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Combo Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="name" id="title" placeholder="Combo Name" value="<?php echo $name;?>">
                      </div>
                  </div> 
                 
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price of Combo Meal" value="<?php echo $price;?>">
                      </div>
                  </div> 
           
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="username">Menu</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="menu[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                        <?php
                         $m = mysqli_query($con,"SELECT * FROM combo_details natural join menu where combo_id='$id'"); 
                                  while ($rowm = mysqli_fetch_assoc($m)){  
                         ?>
                            <option selected value="<?php echo $rowm['menu_id'];?>"><?php echo $rowm['menu_name'];?></option>
                         <?php           
                                  }
                        ?>  
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM menu"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                              
            
                  <div class="col-lg-offset-4 col-lg-6">
                        <button type="submit" style = "background: #823E39" class="btn btn-sm btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>  
              </form>
     
            </div>
           
        </div>
    </div>
</div>
    
              <div class="col-md-4">
              <div class="widget">
            
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff"><?php echo $name;?> - P<?php echo $price;?></div>
                  <div class="widget-icons pull-right">
                    <a href="#update" data-target="#update<?php echo $id;?>" data-toggle="modal"><i class="fa fa-pencil "></i></a>
                    <a href="#delete" data-target="#delete<?php echo $id;?>" data-toggle="modal"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content referrer">
                
                  
                  <table class="table table-striped table-bordered table-hover">
                    <tbody>
<?php

    $query1=mysqli_query($con,"select * from combo_details natural join menu where combo_id='$id'")or die(mysqli_error($con));
      while ($row1=mysqli_fetch_array($query1)){
        $cid=$row1['combo_details_id'];
        $menu_id=$row1['menu_id'];
        $menu_name=$row1['menu_name'];
        
?>                        
                    <tr>
                      <td><?php echo $menu_name;?></td>
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
      <div id="dynamicInput">



    </div>


   <div class="clearfix"></div>

</div>





<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 


<div id="addModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Add New Combo Meal</h4>
            </div>
            <div class="modal-body">
            
              <form class="form-horizontal" method="post" action="combo_save.php">
              
                  <div class="form-group">
                      <label class="control-label col-lg-3" for="title">Combo Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="name" id="title" placeholder="Combo Name">
                      </div>
                  </div> 
              
                  <div class="form-group">
                      <label class="control-label col-lg-3" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price of Combo Meal">
                      </div>
                  </div> 
             
                  <div class="form-group">
                      <label class="control-label col-lg-3" for="username">Menu</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="menu[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                       
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM menu"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div>                                      
            
                  <div class="form-group">
                    
                      <div class="col-lg-offset-3 col-lg-6">
                        <button style = "background: #823E39" type="submit" class="btn btn-sm btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                       </div>
                  </div>
              </form>
        
            </div>
            
        </div>
    </div>
</div>

  
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];


  mysqli_query($con,"delete from combo WHERE combo_id='$id'")
  or die(mysqli_error());
  $description = 'Staff Delete Combo Meal';
            mysqli_query($con,"INSERT INTO audittrail(description) 
            VALUES('$description')")or die(mysqli_error());  
  echo "<script>document.location='combo.php'</script>";
    }
    ?> 

<?php include('../includes/js.php');?>  
<script>
         $(function () {
         
         $(".select2").select2();
         

     })
    </script>
    
  
</body>
</html>