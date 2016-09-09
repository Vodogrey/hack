<!DOCTYPE HTML>
<?php

include ('db_data.php');
$db = mysql_connect($host, $user, $pwd);
mysql_select_db("pj", $db);
 
$current_login = $_COOKIE["login"];
 
$result = mysql_query("SELECT CALL_CALLS FROM pj.users,pj.usercalls,pj.cals
where 
	pj.users.LOGIN_USERS = 'andy.koshmaroff'
    and
    pj.users.ID_USERS = pj.usercalls.ID_USER
    and
    pj.usercalls.ID_CALL = pj.cals.ID_CALLS");
$myrow = mysql_fetch_array($result);
echo $myrow['CALL_CALLS'];

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
						 
						<li class="btn-cta"><a href="#"><span>Exit</span></a></li>
						<li class="btn-cta"><a href="#"><span>Contest</span></a></li>
						
					</ul>
				</div>
				
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-lt" role="banner" style="background-image: url(images/img_4.jpg)">
		<div class="overlay"></div>
	
	</header>
	
	
	
	 <div>  

	 <?php 
	 printf ("
	 <table class>
		<tr>
            <td><h4   >Your Call: %s ;</h4>	</td>
            <td><h4   >Contest: GENERAL QSO </h4>	</td>
          
        </tr>
        <tr>
            <td><h4  >RDA: KU03 </h4>	</td>
            <td><h4   >QTH: Taganrog </h4>	</td>
            
        </tr>
		</table> ",
	$myrow['CALL_CALLS']);
	 ?>
	 
	
    </div>

	 

	
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

