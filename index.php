<?php

require 'vendor/autoload.php';

// $cm = new Cmautoload;
// echo $cm->classmap();

$user = new User;
//echo $user->greet();

//echo '<br>';

//echo get_domain();

$db = new Database();
//$db = $database->getConnection();

// echo asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css");

// exit;

?>


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>The Planner</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="shortcut icon" type="image/icon" href="./images/favicon.ico"/>
<link rel="shortcut icon" type="image/icon" href="http://theplanner.ml/images/favicon.ico"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Perfection Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
</head>
<body>
	<!--banner-->
	<div class="banner">
		<!--navigation-->
		<div class="headder">										
			<nav class="navbar navbar-default">
				<div class="container">	
					<div class="navbar-header navbar-right">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="home-social">
							<ul>
								<li><a href="#"></a></li>
								<li><a href="#" class="twt"></a></li>
								<li><a href="#" class="pn"></a></li>
								<li><a href="#" class="gg"></a></li>
							</ul>	
						</div>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
						<div class="top-nav">
							<ul class="nav navbar-nav navbar-left cl-effect-16">
								<li class="first"><a href="index.html" class="active">Home</a></li>
								<li><a href="about.html" data-hover="About">About</a></li>		
								<li><a href="#" data-hover="Services" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="services.html">Services1</a></li>
										<li><a href="services.html">Services2</a></li>
										<li><a href="services.html">Services3</a></li>           
									</ul>
								</li>
								<li><a href="gallery.html" data-hover="Gallery">Gallery</a></li>
								<li><a href="typo.html" data-hover="Typo">Typo</a></li>		
								<li><a href="contact.html" data-hover="Contact">Contact</a></li>
							</ul>								
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</nav>				
			<!--navigation-->
		</div>
		<div class="bnr-text">
			<div class="container">
				<h1><a href="index.html"> The Planner </a></h1>
				<p style="color:#FC4A46;">Perfect wedding planning & fresh ideas for your wedding</p>
			</div>
		</div>
	</div>
	<!--//banner-->
	<div class="banner-bottom">
		<div class="container">
			<h3 class="title">Welcome To Our Site</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus erat sapien, euismod non velit at, finibus interdum magna. Donec maximus diam quis mi aliquam tincidunt. Sed vulputate risus sapien, sollicitudin pharetra leo accumsan sed. Cras rhoncus sapien ac metus vehicula, consequat posuere enim finibus. </p>
			<img src="images/img1.jpg" class="img-responsive" alt=""/>
			<p class="btm-text"><span>"</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus erat sapien, euismod non velit at, finibus interdum magna. Donec maximus diam quis mi aliquam tincidunt. Sed vulputate risus sapien, sollicitudin pharetra leo accumsan sed. Cras rhoncus sapien ac metus vehicula, consequat posuere enim finibus.<span>"</span></p>			
		</div>
	</div>
	<!--slider-->
	<div class="slider"> 
		<div class="container">
		<div class="banner-title"> 
			<!-- banner-text Slider starts Here -->
			<script src="js/responsiveslides.min.js"></script>
			 <script>
				// You can also use "$(window).load(function() {"
					$(function () {
					// Slideshow 3
						$("#slider3").responsiveSlides({
						auto: true,
						pager:false,
						nav:true,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
						}
					});	
				});
			</script>
			<!--//End-slider-script -->
			<div  id="top" class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<img src="images/img2.jpg" class="img-responsive" alt=""/>
					</li>
					<li>
						<img src="images/img3.jpg" class="img-responsive" alt=""/>
					</li>
					<li>
						<img src="images/img4.jpg" class="img-responsive" alt=""/>
					</li>
				</ul>	
			</div>	
		</div>
		</div>
	</div>
	<!--//slider-->
	<!--popular-->
	<div class="popular">
		<div class="container">
			<h3 class="title" >Popular</h3>
			<div class="col-md-5 popular-left">
				<img src="images/img5.jpg" class="img-responsive" alt=""/>
			</div>
			<div class="col-md-7 popular-right">
				<div class="popular-grids">
					<div class="col-md-4 popular-text">
						<img src="images/img6.jpg" class="img-responsive" alt=""/>
					</div>
					<div class="col-md-8 popular-text pplr-right cl-effect-1">
						<h4>Donec maximus diam quisi</h4>
						<p> Vivamus erat sapien, euismod non velit at, finibus interdum magna. Sed vulputate risus sapien consequat posuere enim finibus. </p>
						<a class="more cl-effect-1" href="#">Read More</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="popular-grids">
					<div class="col-md-4 popular-text">
						<img src="images/img7.jpg" class="img-responsive" alt=""/>
					</div>
					<div class="col-md-8 popular-text pplr-right cl-effect-1">
						<h4>Donec maximus diam quisi</h4>
						<p> Vivamus erat sapien, euismod non velit at, finibus interdum magna. Sed vulputate risus sapien consequat posuere enim finibus. </p>
						<a class="more" href="#">Read More</a>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//popular-->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-row">
				<div class="col-md-3 footer-grids">
					<h2><a href="index.html">Perfection</a></h2>
					<p><a href="mailto:example@mail.com">mail@example.com</a></p>
					<p>+2 000 222 1111</p>
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Navigation</h3>					
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About us</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<li><a href="typo.html">Typo</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Support</h3>
					<ul>
						<li><a href="services.html">Services</a></li>
						<li><a href="#">Help Center</a></li>
						<li><a href="#">Lemollisollis</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grids">	
					<h3>Newsletter</h3>
					<p>It was popularised in the 1960s with the release Ipsum. <p>
					<form>					 
					    <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
						<input type="submit" value="Go">					 
				 </form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">		
			<p>Copyright © 2015 Perfection. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>					
		</div>
	</div>
	<!--//footer-->		
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"> </script>
</body>
</html>