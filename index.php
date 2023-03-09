<?php include 'header.php';?>

<body>
	<br>
	<br>
	<br>
	<?php include 'navbar.php';?>
	<br>
	<div class = "content" style="background:img src=back.png">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12" >
				<div class = "col-md-9 col-lg-9 image-content">
					<div class = "widget">
						<div class = "widget-content" style="background:#FBE6C2">
						</div>						
					</div>				
				</div>
									
								
				
	<br>
		<div class = "content" style="padding-left:350px">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12" >
				<div class = "col-md-9 col-lg-9 image-content" style="background:#FBE6C2">
					<div class = "widget">
						<div class = "widget-content">
							<?php include 'slider.php';?>
						</div>						
					</div>				
				</div>
						
			<div class = "col-lg-12 col-md-12 col-xs-12 col-sm-12" style="background:img src=back.png" padding-bottom:50px">
			
			
				
										
				</div>
			</div>
		</div>
			</div>
			<div class = "row">
				<div class = "col-lg-12 center">
					<p class = "center pag-title">&nbsp;</p>
				</div>
				</div>	
			</div>
		</div>	
	<div class  = "content">
			<div class = "col-lg-12 col-sm-12 col-md-12 col-xs-12 last-row" style="background:#FBE6C2">
			<div class = "class = col-lg-12">
				<h1 class = "page-title right" style ="text-align:center;padding-top:60px;padding-bottom:10px;font-size:60px;color:#823E39;font-style: oblique;font-family: Times New Roman, Times, serif">What is Momentum Catering?</h1>
			</div>
				<div class = "col-lg-4 col-md-4 thumb">
					<img src = "img/circle.png">		
				</div>
				<div class = "col-sm-8 col-lg-6 col-md-6">
					<p class = "body-text" style="padding-top:14%;font-size:25px;color:#823E39;word-spacing:3px;line-height:2.0;">Momentum Catering is a family-owned company that aspires to be the premier cuisine and event-related provider for all special occasions. They provide high-quality equipment like as tables and chairs, gorgeous arrangements and decor, and excellent meals.
					</p>
					<br/>
					<p class = "body-text">
					</p>
				</div>
			</div>
		</div>
		

	

	<div class="container">
		<div class="col-md-12 col-lg-12 col-sm-12">
		  <div class="widget">
		
			<div class="widget-head" style="background:#823E39">
			  <div class="pull-left" style="color:#fff">Previous Events</div>
			  <div class="widget-icons pull-right">
	
			  </div>  
			  <div class="clearfix"></div>
			</div>
			<div class="widget-content referrer">
			 
			  <div class="padd"style="background:#FBE6C2">
				<ul class="latest-news">
							<?php
							include('includes/dbcon.php');

								$query=mysqli_query($con,"SELECT * from reservation WHERE r_status = 'Completed' LIMIT 0,5")or die(mysqli_error($con));
								  while ($row=mysqli_fetch_array($query)){
									$id=$row['rid'];
									$what=$row['r_ocassion'];
									$where=$row['r_venue'];
									$date = $row['r_date'];
								   
							?>   												
				  <li>
				
					<h6><a href="#"> <?php echo $what;?> </a> 
						<span class = "pull-right"><?php echo date("M d, Y",strtotime($date));?></span></h6>
					<p><?php echo $where;?></p>
				  </li>
							<?php }?>                                      
				</ul> 
			  </div>
			  <div class="widget-foot" style="background:#FBE6C2">
			  </div>
			</div>
		  </div>
		</div>	
	</div>
		
		
		
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
 <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-1},{b:0,d:1000,o:1}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:1000,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:1900,d:1600,x:-200,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);


            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            
        });

		
    </script>
</body>
</html>



