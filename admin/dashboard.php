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
  
  <title>Dashboard - <?php include('../includes/title.php');?></title>
  <?php include('../includes/links.php');?>
  <link rel="stylesheet" href="admin/css/style.css">
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner" >
  
    <div class="container" >
  
      <div class="navbar-header" style="background:#E9BF6F">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse" style="color:#75312C">
      <span>Menu</span>
      </button>
 
      <a href="index.html" class="navbar-brand hidden-lg">Momentum Catering</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>




<div class="content" style = "background: #823E39">

    <?php include('../includes/sidebar.php');?>


    <div class="mainbar" style="background:#E9BF6F">
      
  
      <div class="page-head" style="margin-top:10px;background:#E9BF6F" >
        <h2 class="pull-left" ><i class="fa fa-home" style="color:#000000;"></i></h2>
        <h2 style="color:#000000;" > <span class="bolded">Dashboard</span> </h2>

        
      </div>

      <div class="matter" style="background:#E9BF6F">
        <div class="container">
          <div class="row">
<?php
include('../includes/dbcon.php');
    $today=date('Y-m-d');
    $query=mysqli_query($con,"select COUNT(*) as count from reservation where r_status='Approved' and r_date>='$today'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $count=$row['count'];
?>             
                      <div class="col-md-4">
                        <div class="alert alert-info">
                          <i class="fa fa-thumbs-o-up pull-left" style="font-size:65px"></i><h2> <?php echo $count;?> </h2>
                          <p>Approved</p>
                        </div>
                      </div>
<?php
    $query=mysqli_query($con,"select COUNT(*) as count from reservation where r_status='Pending' and r_date>='$today'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $count=$row['count'];
?> 
                      <div class="col-md-4">
                        <div class="alert alert-warning">
                          <i class="fa fa-spinner pull-left" style="font-size:65px"></i><h2 class=""><?php echo $count;?></h2>
                          <p>Pending</p>                        
                        </div>
                      </div>
<?php
    $query=mysqli_query($con,"select COUNT(*) as count from reservation where r_status='Finished'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $count=$row['count'];
?> 
                      <div class="col-md-4">
                        <div class="alert alert-success">
                          <i class="fa fa-check-circle-o pull-left" style="font-size:65px"></i><h2><?php echo $count;?></h2>
                          <p>Completed</p>
                        </div>
                      </div>

                    
          </div> 
          <div class="row">
            <div class="col-md-5">
            
              <div class="widget">
            
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff">Monthly Sales Report 
                    <a href="dashboardprint.php" target="_blank" class="btn btn-info" style = "background: #823E39">Print</a>
                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>              

                <div class="widget-content">
                  <div class="padd">

                      <div id="graph"></div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-5">
           
              <div class="widget">
           
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff">Monthly Reservation Report
                    <a href="dashboardprint2.php" target="_blank" class="btn btn-info" style = "background: #823E39">Print</a>
                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>              

      
                <div class="widget-content">
                  <div class="padd">

                      <div id="graph1"></div>
                  </div>
                </div> 
              </div>
            </div>

            <div class="col-md-2">
             
              <div class="widget">
          
                <div class="widget-head" style = "background: #823E39">
                  <div class="pull-left" style = "color: #ffffff">Reservation</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>              

              
                <div class="widget-content">
                  <div class="padd">
                    <ul class="recent">
<?php
    $query=mysqli_query($con,"select * from reservation where r_status='Approved' and r_date>='$today' order by r_date")or die(mysqli_error($con));
      while($row=mysqli_fetch_array($query)){
        $name=$row['r_last'].", ".$row['r_first'];
        $date=$row['r_date'];
?> 

                      <li>

                        <div class="recent-content">
                          <div class="recent-meta"><?php echo date("M d, Y",strtotime($date));?></div>
                          <div><?php echo $name;?>
                          </div>

                          <div class="clearfix"></div>
                        </div>
                      </li>

<?php }?>                                    


                    </ul>
                      
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

<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  
  mysqli_query($con,"delete from reservation WHERE rid='$id'")
  or die(mysqli_error());
  echo "<script>document.location='pending.php'</script>";
    }
    ?>
<!-- JS -->
<?php include('../includes/js.php');?>  
<script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 25,
              },
              title: {
                  text: '',
                  x: -20
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Sales'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },

              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              plotOptions: {
        column: {
            dataLabels: {
                enabled: true,
                crop: false,
                overflow: 'none'
            }
        }
    },

              series: []
          }

          
          $.getJSON("data1.php", function(json) {
      options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph1',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 25
              },
              title: {
                  text: '',
                  x: -20 
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Reservations'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data_reserve1.php", function(json) {
      options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
</body>
</html>