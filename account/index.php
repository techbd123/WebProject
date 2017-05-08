<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | AppStore </title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/jquery.js"></script>
	<script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +88 01745 346787 (Washeef)</a></li>
								<li><a href=""><i class="fa fa-phone"></i> +88 01521 496081 (Osama)</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@appstore.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="../"><img src="../images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a>
									<div class="btn-group pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="../" onclick="ProcessLogout()" >Logout</a></li>
											</ul>
										</div>
									</div>								
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-2">
					<?php
					if($_COOKIE['isDeveloper']=="1")
					{
						echo '
						<div class="login-form"><!--Upload form-->
							<h2>Upload App</h2>
							<form id="uploadForm" action="">
								<label>App Name:</label>
								<input id="appName" type="text" placeholder="" />

								<label>Category:</label>
								<select id="appCategory">
									<option disabled selected value> --- Select A Category --- </option>
									<option>games</option>
									<option>application</option>
									<option>desktop</option>
								</select>

								<label>Sub Category:</label>
								<input id="appSubCategory" type="text" />

								<label>Version:</label>
								<input id="appVersion" type="text" />

								<label>App Logo Link:</label>
								<input id="appLogoLink" type="text" />

								<label>App File Link:</label>
								<input id="appFileLink" type="text" />

								<button type="submit" onclick="ProcessUploadApp()" class="btn btn-default">Upload</button>
							</form>
						</div><!--/Upload form--><div class="login-form"><!--Upload form-->
						';
					}
					?>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<!--div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html" class="active">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<script type="text/javascript">
		function ProcessLogout()
		{
			deleteCookie('login');
			deleteCookie('userid');
			deleteCookie('isDeveloper');
			return ;
		}

		function ProcessUploadApp()
		{
			var name=document.getElementById("appName").value;
			var category=document.getElementById("appCategory").value;
			var subcategory=document.getElementById("appSubCategory").value;
			var version=document.getElementById("appVersion").value;
			var applogolink=document.getElementById("appLogoLink").value;
			var appfilelink=document.getElementById("appFileLink").value;
			var userid=<?php echo $_COOKIE['userid'];?>;
			$.ajax(
			{
				async: false,
				cache: false,
			    type: 'GET',
			    url: 'uploadApp.php', 
			    data: {"name":name, "category":category, "subcategory":subcategory, "version":version, "applogolink":applogolink,"appfilelink":appfilelink,"userid":userid},
			    success: function(response)
			    {
			    	if(response['result']) alert("Upload Success!");
			    	else alert("Upload Failed!");
					document.getElementById("uploadForm").setAttribute("action","./");
			    }
			});
			return ;
		}
	</script>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>App</span>Store</h2>
							<p>App Store App Store App Store App Store App Store App Store</p>
						</div>
					</div>
					<div class="col-sm-7">
						<!--div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="../images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div-->
		
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="../images/home/csedu.map.jpg" alt="" />
							<p>CSE DU</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privacy Policy</a></li>
								<li><a href="">Billing System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About App Store</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About App Store</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © <?php date_default_timezone_set('UTC');echo date("Y"); ?> App Store. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">App Store</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
</body>
</html>