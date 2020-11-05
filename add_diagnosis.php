<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Medical Website Template | About :: W3layouts</title>
		<link href="web/css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="web/bootstrap/bootstrap.min.css">
		  <script src="web/bootstrap/jquery.min.js"></script>
		  <script src="web/bootstrap/bootstrap.min.js"></script>
		  <script type="text/javascript">
			function loaddiv(value){
				
				if(value=="NA"){
					$('.gender-dependant').css('display','none');
					$('.gender-nondependant').css('display','block');
				}
				else{
					$('.gender-dependant').css('display','block');
					$('.gender-nondependant').css('display','none');
				}
			}
		  </script>
	</head>
	<body>
		<!---start-wrap---->
		
			<!---start-header---->
			<div class="header">
					
				</div>
					<div class="main-header">
						<div class="wrap">
							<div class="logo">
								<a href="index.html"><img src="web/images/logo.png" title="logo" /></a>
							</div>
							<div class="social-links">
								<ul>
									<li><a href="#"><img src="web/images/facebook.png" title="facebook" /></a></li>
									<li><a href="#"><img src="web/images/twitter.png" title="twitter" /></a></li>
									<li><a href="#"><img src="web/images/feed.png" title="Rss" /></a></li>
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
								<li><a href="index.html">Home</a></li>
								<!-- <li class="active"><a href="about.html">About</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="news.html">News</a></li>
								<li><a href="contact.html">Contact</a></li> -->
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
			</div>
			<!---End-header---->
			<!----start-content----->
			<div class="content">
				<div class="wrap">
				<div class="about">
					<div class="title"><h3>	Add New Diagnosis</h3></title>
					<form class="form-horizontal" role="form" action="diagnosis_process.php" method="post">
					  <div class="form-group">
						<label class="control-label col-sm-2" for="symtom">Symtom:</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" name="symtom" id="symtom" placeholder="Enter symtom">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="gender">Gender:</label>
						<div class="col-sm-4"> 
						  <select class="form-control" id="gender" name="gender" onchange="loaddiv(this.value)">
							<option >Select gender</option>
							<option value="Female">Female</option>
							<option value="Male">Male</option>
							<option value="NA">Not Applicable for this Symtom</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group gender-dependant" style="display:none;"> 
						<label class="control-label col-sm-2" for="gender">Diagnosis Questions (Gender Dependant):</label>
						<div class="col-sm-4">
							<label class="control-label col-sm-2" for="symtom">Male</label><br/>
							<input type="text" class="form-control" name="mquestion" id="symtom" placeholder="Male Questions"><br/>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="answer" placeholder="Answer">
							</div>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="medicine" placeholder="Medicine">
							</div>
						</div>
						<div class="col-sm-4">
							<label class="control-label col-sm-2" for="symtom">Female</label><br/>
							<input type="text" class="form-control" name="fquestion" id="question" placeholder="Female Questions"><br/>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="answer" placeholder="Answer">
							</div>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="medicine" placeholder="Medicine">
							</div>

						</div>
					  </div>
					  <div class="form-group gender-nondependant" style="display:none;"> 
						<label class="control-label col-sm-2" for="gender">Diagnosis Questions (Gender Non-Dependant)</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="nquestions" id="question" placeholder="Enter symtom">
							<br/>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="answer" placeholder="Answer">
							</div>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="medicine" placeholder="Medicine">
							</div>
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
					<!-- <p>Design by <a href="http://w3layouts.com/">W3layouts</a></p> -->
				</div>
				<!---End-copy-right----->
			</div>
		</div>
		<!---End-footer---->
	</body>
</html>

