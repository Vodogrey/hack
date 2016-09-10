<!DOCTYPE HTML>
<?php

include ('db_data.php');

 
$current_login = $_COOKIE["login"];
 
$result = mysql_query("SELECT CALL_CALLS FROM pj.users,pj.usercalls,pj.cals
where 
	pj.users.LOGIN_USERS = '$current_login'
    and
    pj.users.ID_USERS = pj.usercalls.ID_USER
    and
    pj.usercalls.ID_CALL = pj.cals.ID_CALLS");
$myrow = mysql_fetch_array($result);
 
include ('function.php');
$callsignid = 242;
$result = last_N(242,3);
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SPORADIC.LOG</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">SPORADIC.log<em>.</em></a></div>
				</div>
				
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li class="btn-cta"><a href="#"><span>Contest</span></a></li>
						<li class="btn-cta"><a href="exit.php"><span>Exit</span></a></li>
					
						
					</ul>
				</div>
				
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-lt" role="banner" style="background-image: url(images/img_4.jpg)">
		<div class="overlay"></div>
	
	</header>
	
	
	
	<div class=" text-center">
					
<div class="row">
					<div class="row row-mt-5em">

								
					 <table class="scroll">
						 <?php 
						 printf ("
						
						   <tbody>
							<tr>
								<td><h4   >Your Call: %s </h4>	</td>
								<td><h4   >Contest: GENERAL QSO </h4>	</td>
							  
							</tr>
							<tr>
								<td><h4  >RDA: KU03 </h4>	</td>
								<td><h4   >QTH: Taganrog </h4>	</td>
								
							</tr>
							  </tbody>
							",
						$myrow['CALL_CALLS']);
						 ?>
						 </table> 
	
						</div>
						</div>
						
					</div>
							
			

	<header id="gtco-header" class="gtco-cover gtco-cover-free" role="banner" ">
		<div class="overlay"></div>
		
		
		 <table class="tQSO" align="center">
	<?php
$myrow = mysql_fetch_array($result);
printf('<tr><td><h4>Band</h4></td>
			<td><h4>Mode</h4></td>
			<td><h4>Time</h4></td>
			<td><h4>QsS</h4></td>
			<td><h4>Call</h4></td>
			<td><h4>RSTout</h4></td>
			<td><h4>RSTin</h4></td>
			<td><h4>NRin</h4></td><tr>');
do{
	printf('<tr>
		<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			<td><h4>%s</h4></td>
			</tr>', $myrow['BAND_BANDS'],$myrow['NAME_MODS'],$myrow['dateq'],$myrow['NROUT_QSOS'],
					$myrow['call_in'],$myrow['RST_OUT_QSOS'],$myrow['RSTIN_QSOS'],$myrow['NRIN_QSOS']);
} while ($myrow = mysql_fetch_array($result));			


?></table>
	</header>

<div class="text-center">
					
<div class="row">
					
                                                        
					 <table class="QSO_Top_panel" align="center">
						   <tbody>
							 
							<tr>
									<td> 
														<div class="col-md-11">
                                                            <label for="username">Mod: </label>
                                                           	<select name="nubexSelect" size="1"  form="nubexForm">
															<option>CW</option>
															<option>SSB</option>
															<option>RTTY</option>
															</select>
                                                        </div>

                               	</td>
								<td> 
														<div class="col-md-11">
                                                            <label for="username">Band: </label>
                                                           	<select name="nubexSelect2" size="1"  form="nubexForm">
															<option>10m</option>
															<option>15m</option>
															<option>20m</option>
															<option>40m</option>
															<option>80m</option>
															<option>160m</option>
															</select>
                                                        </div>

                               	</td>
								<td> 
                                        <div class="col-md-12">
										<table >
											 <tr>
											<td>  <label for="username">Call: </label>
											</td> 
											<td>  <input type="text" class="active form-control" id="username" name="e_call">
											</td> 
										 </tr>
										</table >										 
                                         </div>                  
                                                            
                                                         
                               	</td>
								<td> 
                                         <div class="col-md-12">
										<table >
										 <tr>
											<td>  <label for="username">RST: </label>
											</td> 
											<td>  <input type="text" class="form-control" id="username" name="e_rst">
											</td> 
										 </tr>
										</table >										 
                                          </div>                   
                                                            
                                                         
                               	</td>
								<td> 
                                           <div class="col-md-12">
										  <table >
										 <tr>
											<td>  <label for="username">NR: </label>
											</td> 
											<td>  <input type="text" class="form-control" id="username" name = "e_nr">
											</td> 
										 </tr>
										</table >	
                                                        
                               	</td>
							
									<td> 
           <form id="nubexForm" action="do.php">
		 <div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Send">
													</div>
	</form>
	
	 
                               	</td>
								
							</tr>
							  </tbody>
					</table> 
	
					
						
					</div>





			
	<header id="gtco-header" class="gtco-cover gtco-cover-lt" role="banner" style="background-image: url(images/img_4.jpg)">
		<div class="overlay"></div>
	
	</header>

	 

	
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

