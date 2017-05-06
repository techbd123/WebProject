<?php

$bannerImageSrc="images/shop/advertisement.jpg";


?>

<header id=""><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6 ">
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
						<a href="."><img src="images/home/logo.png" alt="" /></a>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href=""><i class="fa fa-user"></i> Account</a></li>
							<li><a href="login"><i class="fa fa-lock"></i> Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
	<div class="header-bottom"><!--header-bottom-->
		<section id="advertisement">
			<div class="container">
				<a href="."><img src="<?php echo $bannerImageSrc ?>" alt="" /></a>
			</div>
		</section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="search_box pull-right" >
						<form id="searchBox" action="" method="post">
						<input id="inputSearchBox" list="list" name="list" type="text" placeholder="Search..." onkeyup="Listing()">
							  <datalist id="list"></datalist>
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>