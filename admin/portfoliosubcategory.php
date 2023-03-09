<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en" style = "background: #823E39">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">

  <title>Category - <?php include('../includes/title.php');?></title>
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
        <h2 style="color:#000000;"> Dashboard 
        <a href="#addModal" class="btn btn-info" style = "background: #823E39" data-toggle="modal">Add New Portfolio</a>
      </h2>

      <div class="matter">
        <div class="container" style="background:#E9BF6F">
          <div class="row">
            <div class="col-md-12">

              <div class="widget" >
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff"> Portfolio Category
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
                        <th>Image</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"SELECT * FROM portfoliocategory INNER JOIN portfolio ON portfoliocategory.portfoliocategory_id=portfolio.portfoliocategory_id")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['id'];
        $portfoliocategory_id=$row['portfoliocategory_id'];
        $category=$row['category'];
        $image=$row['image'];

?>                      
                      <tr>
                        <td><img src="../portfolio/<?php echo $image;?>" width="100px" height="100px"></td>
                        <td><?php echo $category;?></td>
                        
                        <td>
                              <a href="#update" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <a href="#delete" class="btn btn-danger" data-target="#delete<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-times"></i>
                              </a>
                              <div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Update Portfolio</h4>
            </div>
            <div class="modal-body" style="height:200px">
     
              <form class="form-horizontal" method="post" action="portfoliosubcategory_update.php" enctype='multipart/form-data'>
        
                  <input type="hidden" name="id" value="<?php echo $id;?>">

                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category </label>
                      <div class="col-lg-8"> 
                        <select class="form-control" name="portfoliocategory_id" id="title" placeholder="Category">

                          <option value="<?php echo $portfoliocategory_id ?>"><?php echo $row['category'] ?></option>
                          <?php
                           $query2=mysqli_query($con,"SELECT * from portfoliocategory")or die(mysqli_error($con));
                           ?>
                          <?php while ($row2=mysqli_fetch_array($query2)){ ?>
                            <option value="<?php echo $row2['portfoliocategory_id'] ?>"><?php echo $row2['category'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Image </label>
                      <div class="col-lg-8"> 
                        <input type="file" class="form-control" name="image" id="title">
                      </div>
                  </div> 
            
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8" >
                        <button type="submit" style = "background: #823E39" class="btn btn-sm btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>  
              </form>
  
            </div>
           
        </div>
    </div>
</div>


<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete Portfolio</h4>
            </div>
            <div class="modal-body" style="height:140px">
         
              <form class="form-horizontal" method="post" action="portfoliosubcategory_delete.php">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete Portfolio?
                    </div>                     
            
                  
                      
                        <button type="submit" class="btn btn-sm btn-primary" name="del">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                      
                 
              </form>
        
            </div>
           
        </div>
    </div>
</div>

                        </td>
                      </tr>


 
         
<?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <tr>
                        <th>Image</th>
                        <th>Category</th>
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
              <h4 class="modal-title">Add New Portfolio</h4>
            </div>
            <div class="modal-body">
          
              <form class="form-horizontal" method="post" action="portfoliosubcategory_save.php" enctype='multipart/form-data'>
                <?php
                 $query=mysqli_query($con,"SELECT * from portfoliocategory")or die(mysqli_error($con));
                 ?>
      
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category </label>
                      <div class="col-lg-8"> 
                        <select class="form-control" name="portfoliocategory_id" id="title" placeholder="Category">
                          <option value="">Select</option>
                          <?php while ($row=mysqli_fetch_array($query)){ ?>
                            <option value="<?php echo $row['portfoliocategory_id'] ?>"><?php echo $row['category'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Image </label>
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


<!-- JS -->
<?php include('../includes/js.php');?>  


</body>
</html>