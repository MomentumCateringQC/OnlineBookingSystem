<?php include 'header.php';?>
<div class="Momentum-Catering" style="display: flex; justify-content: center; align-items:center;">
<img src="../img/mc.png" alt="mc image" width="1000" height="400" >

</div>

<body class = "admin_body" style = "background-color:#75312C !important; background:none;>

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    
    <a style = "color:white;" href="../dashboard2.php"></a>
  </div>
  
  <div class="lockscreen-name">Staff</div>

  
  <div class="lockscreen-item">
  
    <div class="lockscreen-image">
      <img src="../img/mc2.png" alt="User Image">
    </div>

    <form class="lockscreen-credentials" action = "dashboard2.php"method = "POST">
      <div class="input-group">
        <input type="hidden" name = "username" class="form-control" placeholder="username" value = "admin">
        <input type="password" name = "password" class="form-control" placeholder="password" autofocus>

        <div class="input-group-btn">
          <button name = "login"class="btn"><i class="fa fa-arrow-right "></i></button>
          
        </div>
        
      </div>
    </form>
 

  </div>
  
  

  

    
    
    

</div>
	
	
		


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>