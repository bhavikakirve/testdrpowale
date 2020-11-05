<?PHP
session_start();
//error_reporting(E_ALL);
if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!=0){	
		header("Location:patient.php");	
}else{
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Home | Dr. Powale's </title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 2500,
			        speed: 600
			      });
			});
		  </script>
		  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		  <script src="bootstrap/jquery.min.js"></script>
		  <script src="bootstrap/bootstrap.min.js"></script>
	</head>
	<body>
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
					<!--<div class="top-header">
						<div class="wrap">
						 <div class="top-header-left">
							<p>+800-020-12345</p>
						</div> 
						<div class="right-left">
							<ul>
								<li class="login"><a href="#">Login</a></li>
								<li class="sign"><a href="#">Sign up</a></li>
							</ul>
						</div>
						<div class="clear"> </div>
					</div>
				</div>-->
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.html"><img src="images/logo.jpg" title="logo" /></a>
							</div>
							<div class="social-links">
								<ul>
									<li><a href="#"><img src="images/facebook.png" title="facebook" /></a></li>
									<li><a href="#"><img src="images/twitter.png" title="twitter" /></a></li>
									<li><a href="#"><img src="images/feed.png" title="Rss" /></a></li>
									<div class="clear"> </div>
								</ul>
							</div>
							<div class="clear"> </div>
						</div>
					</div>
					<div class="clear"> </div>
					<div class="top-nav">
						<div class="wrap">
							<ul>
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="news.html">News</a></li>
								<li><a href="contact.html">Contact</a></li>
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
			</div>
			<!---End-header---->
			<!---start-images-slider---->
			<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides rslides1" id="slider1" style="max-width: 2500px;">
					      <li id="rslides1_s0" class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; -webkit-transition: opacity 600ms ease-in-out; transition: opacity 600ms ease-in-out;">
					      	<img src="images/slider3.png" alt="">
					      	<div class="slider-info">
					      		<p>Medica the best Hospital website</p>
					      		<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
					      		<a href="#">ReadMore</a>
					      	</div>
					      </li>
					      <li id="rslides1_s1" class="" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; -webkit-transition: opacity 600ms ease-in-out; transition: opacity 600ms ease-in-out;"><img src="images/slider2.png" alt="">
					      	<div class="slider-info">
					      		<p>Medica the best Hospital website</p>
					      		<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
					      		<a href="#">ReadMore</a>
					      	</div>
					      </li>
					      <li id="rslides1_s2" class="rslides1_on" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; -webkit-transition: opacity 600ms ease-in-out; transition: opacity 600ms ease-in-out;"><img src="images/slider2.png" alt="">
					      	<div class="slider-info">
					      		<p>Medica the best Hospital website</p>
					      		<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
					      		<a href="#">ReadMore</a>
					      	</div>
					      </li>
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
			<!---End-images-slider---->
			<!----start-content----->
			<div class="content">
				<div class="content-top-grids">
					<div class="wrap">
						<div class="content-top-grid">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="images/timer.png" title="image-name" /></a>
								</div>
								<div class="content-top-grid-title">
									<h3>24x7 Servives</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="images/tool.png" title="image-name" /></a>
								</div>
								<div class="content-top-grid-title">
									<h3>CARE ADVICES</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
								<a class="grid-button" href="#">Read More</a>
								<div class="clear"> </div>
						</div>
						<div class="content-top-grid login-block">
							<div class="content-top-grid-header">
								<div class="content-top-grid-pic">
									<a href="#"><img src="images/login2.png" title="image-name" /></a>
								</div>
								<div class="content-top-grid-title">
									<h3>Login</h3>
								</div>
								<div class="clear"> </div>
							</div>
								<div class="">
								<form class="form-horizontal" role="form" action="login_process.php" method="POST">
									<div class="form-group">
									  <label class="control-label col-sm-2" for="username">Username:</label>
									  <div class="col-sm-10">
										<input type="text" class="form-control" id="email" name="username" placeholder="Enter username">
									  </div>
									</div>
									<div class="form-group">
									  <label class="control-label col-sm-2" for="pwd">Password:</label>
									  <div class="col-sm-10">          
										<input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
									  </div>
									</div>
									
									<div class="form-group">        
									  <div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default">Submit</button>
									  </div>
									</div>
								  </form>
								</div>
								<div class="clear"> </div>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="clear"> </div>
				<div class="boxs">
					<div class="wrap">
						<div class="section group">
							<!-- <div class="grid_1_of_3 images_1_of_3">
								  <h3>WELCOME!</h3>
								  <span>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod.</span>
								  
							     <div class="button"><span><a href="#">Read More</a></span></div>
							</div>
							<div class="grid_1_of_3 images_1_of_3">
								  <h3>ABOUT US</h3>
								  <span>Lorem ipsum dolor sit amet conse ctetur adipisicing elit,</span>
								  
							     <div class="button"><span><a href="#">Read More</a></span></div>
							</div>
							<div class="grid_1_of_3 images_1_of_3">
								  <h3>OUR SERVICES</h3>
								  
							     <div class="button"><span><a href="#">Read More</a></span></div>
							</div> -->
						</div>
					</div>
					</div>
			<!----End-content----->
		</div>
		<!---End-wrap---->
		<!---start-footer---->
		<div class="footer">
			<div class="wrap">
				<div class="footer-grids">
					<div class="footer-grid">
						<h3>OUR Profile</h3>
						 <ul>
							<li><a href="#">Lorem ipsum dolor sit amet</a></li>
							<li><a href="#">Conse ctetur adipisicing</a></li>
							<li><a href="#">Elit sed do eiusmod tempor</a></li>
							<li><a href="#">Incididunt ut labore</a></li>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>Our Services</h3>
						 <ul>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
							<li><a href="#">Quis nostrud exercitation</a></li>
							<li><a href="#">Ullamco laboris nisi</a></li>
							<li><a href="#">Ut aliquip ex ea commodo</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>OUR FLEET</h3>
						 <ul>
							<li><a href="#">Lorem ipsum dolor sit amet</a></li>
							<li><a href="#">Conse ctetur adipisicing</a></li>
							<li><a href="#">Elit sed do eiusmod tempor</a></li>
							<li><a href="#">Incididunt ut labore</a></li>
							<li><a href="#">Et dolore magna aliqua</a></li>
							<li><a href="#">Ut enim ad minim veniam</a></li>
						</ul>
					</div>
					<div class="footer-grid">
						<h3>CONTACTS</h3>
						 <p>Lorem ipsum dolor sit amet ,</p>
						 <p>Conse ctetur adip .</p>
						 <p>ut labore Usa.</p>
						 <span>(202)1234-56789</span>
					</div>
					<div class="clear"> </div>
				</div>
				<div class="clear"> </div>
				<!---start-copy-right----->
				<div class="copy-tight">
					<p> <a href=""></a></p>
				</div>
				<!---End-copy-right----->
			</div>
		</div>
		<!---End-footer---->
	</body>
</html>
<?php
}
	?>