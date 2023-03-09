<div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

      
        <ul id="nav">
          <?php if ($_SESSION['type'] == 0) { ?>
            <li class="open"><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
          </li>
          <li class="has_sub"><a href="#"><i class="fa fa-bar-chart-o"></i> Report  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="#reserve" data-toggle="modal">Reservation</a></li>
              <li><a href="#sales" data-toggle="modal">Monthly Sales</a></li>
              <li><a href="paymentreport.php">Payment Report</a></li>
              <li><a href="databacklog.php">Data Backlog</a></li>
            </ul>
          </li> 
          <li class="has_sub">
			<a href="#"><i class="fa fa-file-o"></i> Maintenance  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>			
     
              <!-- <li><a href="members.php">Members</a></li> -->
              <!-- <li><a href="teams.php">Teams</a></li> -->
              <!-- <li><a href="team_members.php">Team Members</a></li> -->
              <li><a href="user.php">User</a></li>
            </ul>
          </li>   
          
          <?php }else { ?>
          
          <li class="has_sub">
			<a href="#"><i class="fa fa-calendar"></i> Reservation  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="reservation.php">Confirmed Reservations</a></li>
              <li><a href="pending.php">Pending Reservations</a></li>
              <li><a href="finished.php">Completed Reservations</a></li>
              <li><a href="cancelled.php">Cancelled Reservations</a></li>
            </ul>
          </li>  
          <li><a href="combo.php"><i class="fa fa-bar-chart-o"></i> Combo</a></li> 
          <li><a href="order.php"><i class="fa fa-money bgreen"></i> Menu Orders</a></li> 
          <li><a href="messages.php"><i class="fa fa-envelope"></i> Messages</a></li> 
          <li><a href="faqs.php"><i class="fa fa-edit"></i> FAQ's</a></li>
          <li class="has_sub">
            <a href="#"><i class="fa fa-folder"></i> Packages  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="packagescategory.php">Category</a></li>
              <li><a href="packages.php">Sub Category</a></li>
            </ul>
          </li>
          <li class="has_sub">
      <a href="#"><i class="fa fa-folder"></i> Portfolio  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="portfoliocategory.php">Category</a></li>
              <li><a href="portfoliosubcategory.php">Sub Category</a></li>
            </ul>
          </li>
          <li class="has_sub">
			<a href="#"><i class="fa fa-file-o"></i> Maintenance  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>			
              <li><a href="menu.php">Menu</a></li>
              <li><a href="category.php">Category</a></li>
              <li><a href="subcategory.php">Subcategory</a></li>
           
              <!-- <li><a href="members.php">Members</a></li> -->
              <!-- <li><a href="teams.php">Teams</a></li> -->
              <!-- <li><a href="team_members.php">Team Members</a></li> -->
           
            </ul>
          </li>   
          <li><a href="contactinformation.php"><i class="fa fa-edit"></i> Contact Information</a></li> 
          
		  	   <?php } ?>
         
        </ul>
    </div>
    <?php include 'report_modal.php'; ?>
    <?php include 'report_sales.php'; ?>