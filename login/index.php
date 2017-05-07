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
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-5 col-sm-offset-0">
						<div class="login-form"><!--login form-->
							<h2>Login to Your Account</h2>
							<form id="loginForm">
								<input id="loginText" type="text" placeholder="Username/Email Address" />
								<input id="loginPassword" type="password" placeholder="Password"/>
								<p style="color: red" id="loginPasswordInfo"></p>
								<span>
									<input id="loginIsKeepSignedIn" type="checkbox" value="1" class="checkbox"> 
									Keep me signed in
								</span>
								<button id="loginButton" type="submit" onclick="ProcessLogin()" class="btn btn-default">Login</button>
							</form>
						</div><!--/login form-->
					</div>
					<div class="col-sm-1 col-sm-offset-1">
						<h2 class="or">OR</h2>
					</div>
					<div class="col-sm-5 col-sm-offset-1">
						<div class="signup-form"><!--sign up form-->
							<h2>New User Signup!</h2>
							<form id="signupForm" action="">
								<input id="signupUsername" type="text" placeholder="Username"/>
								<p style="color: red" id="usernameInfo"></p>
								<input id="signupEmail" type="email" placeholder="Email Address"/>
								<p style="color: red" id="emailInfo"></p>
								<input id="signupPassword" type="password" placeholder="Password" maxlength="64" pattern=".{6,}" required title="6 characters minimum" />
								<p style="color: red" id="passwordInfo"></p>
								<span>
									Are you a developer?
									<input id="signupIsDeveloper" type="checkbox" value="1" class="checkbox">
								</span>
								<button id="signupButton" type="submit" onclick="ProcessSignup()" class="btn btn-default">Signup</button>
							</form>
						</div><!--/sign up form-->
					</div>
				</div>
			</div>		
		</div><!--/header-middle-->
	</header><!--/header-->
	<script type="text/javascript">
		function ProcessSignup()
		{
			var username=document.getElementById("signupUsername").value;
			var email=document.getElementById("signupEmail").value;
			var password=document.getElementById("signupPassword").value;
			var isDeveloper=document.getElementById("signupIsDeveloper").checked;
			document.getElementById("usernameInfo").innerHTML="";
			document.getElementById("emailInfo").innerHTML="";
			document.getElementById("passwordInfo").innerHTML="";
			if(username.length<1)
			{
				document.getElementById("usernameInfo").innerHTML="Username shouldn't be empty";
				return ;	
			}
			if(email.indexOf("@")<0)
			{
				document.getElementById("emailInfo").innerHTML="Email should contain @";
				return ;
			}
			if(password.length<6)
			{
				document.getElementById("passwordInfo").innerHTML="6 characters minimum";
				return ;
			}
			$.ajax(
			{
				async: false,
				cache: false,
			    type: 'GET',  
			    url: 'register.php', 
			    data: {"username":username,"email":email,"password":password,"isDeveloper":isDeveloper},
			    success: function(response)
			    {
			        if(response['username']&&response['email'])
					{
						alert("Registration Success!");
						document.getElementById("signupForm").setAttribute("action","../");
					}
					else if(response['username'])
					{
						alert("Email already exists! Try again.");
					}
					else
					{
						alert("Username already exists! Try again");
					}
			    }
			});
  			return ;
		}

		function ProcessLogin()
		{
			var text=document.getElementById("loginText").value;
			var password=document.getElementById("loginPassword").value;
			var isKeepSignedIn=document.getElementById("loginIsKeepSignedIn").checked;
			$.ajax(
			{
				async: false,
				cache: false,
			    type: 'GET',  
			    url: 'find.php', 
			    data: {"username":text,"email":text,"password":password},
			    success: function(response)
			    {
			        if(response['username']&&response['password']||response['email']&&response['password'])
					{
						alert("Login Success!");
						document.getElementById("loginForm").setAttribute("action","../");
						var days=1;
						if(isKeepSignedIn) days=7;
						setCookie("login",true,days);
						setCookie("userid",response['userid'],days);
					}
					else
					{
						alert("Wrong Login Credential!");
					}
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
					<p class="pull-right">Designed by <span><a target="_blank" href="#">AppStore</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
</body>
</html>