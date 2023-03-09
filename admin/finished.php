<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en" style="background: #823E39">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  
  <title>Completed - <?php include('../includes/title.php');?></title>
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
        <h2 class="pull-left"><i class="fa fa-home" style="color:#000000"></i></h2>
        <h2 style="color:#000000;"> Dashboard </h2>


      <div class="matter">
        <div class="container" style="background:#E9BF6F">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff"> Completed Reservations
                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
        
              <div class="page-tables">
          
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>RCode</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Contact</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>MOP</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from reservation where r_status='Completed'")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['rid'];
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $type=$row['r_type'];
?>                      
                 <tr>
                        <td><?php echo $rcode;?></td>
                        <td><?php echo $last;?></td>
                        <td><?php echo $first;?></td>
                        <td><?php echo $contact;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $venue;?></td>
                        <td><?php echo $row['modeofpayment'];?></td>
                     
                        <td>
                              <!-- <a href="#update" class="btn btn-default" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-money bgreen"></i>
                              </a> -->
                              <a href="reservation_view.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                              </a>

                     
                        </td>
                      </tr>

<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Add Payment</h4>
            </div>
            <div class="modal-body" style="height:120px">
          
              <form class="form-horizontal" method="post" action="payment_save.php" enctype='multipart/form-data'>
             
                  <input type="hidden" name="id" value="<?php echo $id;?>">
            
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Payment</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="amount" id="title" placeholder="Enter Amount">
                      </div>
                  </div> 
               
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Status</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="status">
                                <option>Approved</option>
                                <option>Completed</option>
                                <option>Cancelled</option>
                        </select>
                      </div>
                  </div> 
                  
           
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8">
                        <button type="submit" style = "background: #823E39" class="btn btn-sm btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>  
              </form>
           
            </div>
           
        </div>
    </div>
</div>

         
<?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <tr>
                        <th>RCode</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Contact</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>MOP</th>
                        <th>Action</th>
                      </tr>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot" style = "background: #823E39">
              
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>
      </div>




    </div>

  
   <div class="clearfix"></div>

</div>

<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 


<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add New Menu</h4>
            </div>
            <div class="modal-body">
           
              <form class="form-horizontal" method="post" action="menu_save.php" enctype='multipart/form-data'>
         
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Menu Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="menu" id="title" placeholder="Menu Name">
                      </div>
                  </div> 
             
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="cat">
                         <?php
                            include('../includes/dbcon.php');

                              $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option><?php echo $row['cat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
          
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Subcategory</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="subcat">
                         <?php

                              $result = mysqli_query($con,"SELECT * FROM subcategory ORDER BY subcat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option><?php echo $row['subcat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
               
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Description</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="desc" id="title" placeholder="Description"></textarea>
                      </div>
                  </div> 
            
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price">
                      </div>
                  </div> 
               
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Image</label>
                      <div class="col-lg-8"> 
                        <input type="file" class="form-control" name="image" id="title">
                      </div>
                  </div> 

             
                  <div class="form-group">
               
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
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


  mysqli_query($con,"delete from reservation WHERE rid='$id'")
  or die(mysqli_error());
  echo "<script>document.location='pending.php'</script>";
    }
    ?>

<?php include('../includes/js.php');?>  

</body>
</html>