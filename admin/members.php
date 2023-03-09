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
 
  <title>Members - <?php include('../includes/title.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
    
      <div class="navbar-header" style="background:#E9BF6F">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
      
      <a href="index.html" class="navbar-brand hidden-lg">Chimney</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>


<div class="content" style="margin-top:10px;background:#823E39"">


    <?php include('../includes/sidebar.php');?>


    <div class="mainbar" style="background:#E9BF6F">
      

      <div class="page-head" style="background:#E9BF6F">
        <h2 class="pull-left"><i class="fa fa-home" style="color:#000000"></i></h2>
        <h2 style="color:#000000;"> Dashboard
        <a href="#addModal" class="btn btn-info" style = "background: #823E39" data-toggle="modal">Add New Member</a>
        <div class="clearfix"></div>

      </div>

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff"> Users
                    
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
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from member order by member_last")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['member_id'];
        $last=$row['member_last'];
        $first=$row['member_first'];
        $contact=$row['member_contact'];
        $address=$row['member_address'];
        $status=$row['member_status'];
        if ($status=="active") $flag="success";else $flag="danger";
?>                      
                      <tr>
                        <td><?php echo $last;?></td>
                        <td><?php echo $first;?></td>
                        <td><?php echo $contact;?></td>
                        <td><?php echo $address;?></td>
                        <td><span class="label label-<?php echo $flag;?>"><?php echo $status;?></span></td>
                        <td>
                              <a href="#myModal" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                        </td>
                      </tr>

<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Update Member Details</h4>
            </div>
            <div class="modal-body" style="height:250px">
            
              <form class="form-horizontal" method="post" action="member_update.php">
           
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Last Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="last" id="title" placeholder="Write Last Name" value="<?php echo $last;?>">
                      </div>
                  </div> 
            
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="username">First Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="first" id="username" placeholder="Write First Name" value="<?php echo $first;?>">
                      </div>
                  </div> 
               
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="password">Contact #</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="contact" id="password" placeholder="Write contact number" value="<?php echo $contact;?>">
                      </div>
                  </div> 
                
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="password">Complete Address</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="address" id="password" placeholder="Write complete address"><?php echo $address;?></textarea>
                      </div>
                  </div> 

                  <div class="form-group">
                      <label class="control-label col-lg-4" for="password">Status</label>
                      <div class="col-lg-8"> 
                        <select class="form-control" id="exampleSelect1" name="status">
                                <option><?php echo $status;?></option>
                                <option>active</option>
                                <option>inactive</option>
                        </select>
                      </div>
                  </div>                                
                
                  <div class="form-group">
             
                      <div class="col-lg-offset-4 col-lg-6">
                        <button type="submit" style = "background: #823E39" class="btn btn-sm btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                       </div>
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
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
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
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Add New Member</h4>
            </div>
            <div class="modal-body">
           
              <form class="form-horizontal" method="post" action="member_save.php">
         
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Last Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="last" id="title" placeholder="Write Last Name" required>
                      </div>
                  </div> 
           
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="username">First Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="first" id="username" placeholder="Write First Name" required>
                      </div>
                  </div> 
             
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Contact #</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="contact" id="password" placeholder="Write contact number">
                      </div>
                  </div> 
            
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Complete Address</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="address" id="password" placeholder="Write complete address"></textarea>
                      </div>
                  </div>     
             
                  <div class="form-group">
            
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" style = "background: #823E39" class="btn btn-sm btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                       </div>
                  </div>
              </form>
 
            </div>
            
        </div>
    </div>
</div>

<?php include('../includes/js.php');?>  

</body>
</html>