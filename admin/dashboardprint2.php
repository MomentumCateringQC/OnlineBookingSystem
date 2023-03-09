    <!-- Content Header (Page header) -->
    <div class="content">
    <section>
    <h1 style="text-align: center">Momentum Catering</h1>
      <h4 style="text-align: center">Blk 10 Lot 11 Malipaka St. Maligaya Park Subd. Bgy. Pasong Putik, Quezon City, Philippines</h4>
      <h4 style="text-align: center">0915 960 7869</h4>
      <h4 style="text-align: center">momentumcatering01@gmail.com</h4>

      <br>
      <div>
        <h4 style="text-align: center;">Payment Report</h4>
      </div>
     

    </section>

          <div style="display: flex;">
             <table width="100%" border="1px solid black" style="border-collapse: collapse;">
                <thead>
                  <th style="text-align: left;">Date</th>
                  <th style="text-align: left;">Total</th>
                </thead>
                <tbody>


        <?php
include('../includes/dbcon.php');
    
    $year = date('Y');
    $query=mysqli_query($con,"SELECT COUNT(*) as count,DATE_FORMAT(date_reserved,'%b') as month from reservation where YEAR(date_reserved)='$year' and r_status='Completed' or r_status='Approved ' group by MONTH(date_reserved)")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $month=$row['month'];
        $count=$row['count'];
?>         
                          <tr>
                            <td><?php echo $month;?></td>
                            <td><?php echo $count;?></td>
                            
                          </tr>
    
                      <?php 

                          }
                          ?>



                </tbody>
              </table>
            <div id="graph1" style="width: 80%;"></div>
            </div>
            <h4 style="text-align: right;">
              Total:
              <?php
              $year = date('Y');
              $query=mysqli_query($con,"SELECT COUNT(*) as count from reservation where YEAR(date_reserved)='$year' and r_status='Completed' or r_status='Approved '")or die(mysqli_error($con));
                $row=mysqli_fetch_array($query);
              echo $row['count'];
              ?>
            </h4>
</div>
<button class="btn print btn-info" style = "background: #823E39;color: #fff;border: unset;padding: 10px 30px;margin-top: 30px;">print</button>

<?php include('../includes/js.php');?>  

<script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph1',
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




<script src="js/jQuery.print.min.js"></script>
<script>



     $('.print').on('click', function() { // select print button with class "print," then on click run callback function
  $.print(".content"); // inside callback function the section with class "content" will be printed
});

// plugin creator and full list of options: https://github.com/DoersGuild/jQuery.print

</script>