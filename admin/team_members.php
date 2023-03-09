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

      <a href="index.html" class="navbar-brand hidden-lg">Momentum Catering</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>

<div class="content" style="margin-top:10px;background:#823E39">

    <?php include('../includes/sidebar.php');?>

    <div class="mainbar" style="background:#E9BF6F">

      <div class="page-head" style="background:#E9BF6F">
        <h2 class="pull-left"><i class="fa fa-home" style="color:#000000"></i>
        <h2 style="color:#000000;"> Dashboard
          <a href="#addModal" class="btn btn-info" style = "background: #823E39"data-toggle="modal">Add New Team</a>
        </h2>


        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a> 

          <span class="divider">/</span> 
          <a href="#" class="bread-current">Maintenance</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Team Members</a>
        </div>

        <div class="clearfix"></div>

      </div>


      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from team natural join team_member group by team_id")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['team_id'];
        $team=$row['team_name'];
        $mid=$row['member_id'];
        $tid=$row['team_member_id'];
       
?>  
<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Delete Team</h4>
            </div>
            <div class="modal-body" style="height:140px">
     
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete <?php echo $team;?>?
                    </div>                     
  
                  
                      
                        <button type="submit" style = "background: #823E39" class="btn btn-sm btn-primary" name="del">Delete</button>
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
              <h4 class="modal-title" style = "color: #ffffff">Update Team Members</h4>
            </div>
            <div class="modal-body" style="height:200px">
    
              <form class="form-horizontal" method="post" action="team_member_update.php" enctype='multipart/form-data'>
        
                  <input type="hidden" name="id" value="<?php echo $id;?>">
        
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Team Name</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="team" style="width: 100%;">
                          <option value="<?php echo $id;?>"><?php echo $team;?></option>";
                         
                        </select>
                      </div>
                  </div> 
         
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="username">Members</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="members[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                        <?php
                         $m = mysqli_query($con,"SELECT * FROM team_member natural join member where team_id='$id'"); 
                                  while ($rowm = mysqli_fetch_assoc($m)){  
                         ?>
                            <option selected value="<?php echo $rowm['member_id'];?>"><?php echo $rowm['member_last']." ,".$rowm['member_first'];?></option>
                         <?php           
                                  }
                        ?>  
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM member where member_status='active' ORDER BY member_last"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last']." ,".$row['member_first'];?></option>
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
                  <div class="pull-left" style = "color: #ffffff"><?php echo $team;?></div>
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

    $query1=mysqli_query($con,"select * from team_member natural join member where team_id='$id'")or die(mysqli_error($con));
      while ($row1=mysqli_fetch_array($query1)){
        $mid=$row1['member_id'];
        $last=$row1['member_last'];
        $first=$row1['member_first'];
        $member=$last." ,".$first;
?>                        
                    <tr>
                      <td><?php echo $last." ,".$first;?></td>
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

<div id="addModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style = "background: #823E39">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" style = "color: #ffffff">Add New Team and Members</h4>
            </div>
            <div class="modal-body">
  
              <form class="form-horizontal" method="post" action="team_member_save.php">
       
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Team Name</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="team" style="width: 100%;">
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM team ORDER BY team_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['team_id'];?>"><?php echo $row['team_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
      
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="username">Members</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="members[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM member where member_status='active' ORDER BY member_last"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last']." ,".$row['member_first'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                                            
         >
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
 
  
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

 
  mysqli_query($con,"delete from team_member WHERE team_id='$id'")
  or die(mysqli_error());

    $description = 'Staff Delete Team Members';
            mysqli_query($con,"INSERT INTO audittrail (description) 
            VALUES('$description')")or die(mysqli_error());
  echo "<script>document.location='team_members.php'</script>";
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