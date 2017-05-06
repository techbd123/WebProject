<?php

$bannerImageSrc="images/shop/advertisement.jpg";

class Link
{
	public $name;
	public $href;
	public $classValue;
	function __construct($name,$href,$classValue)
	{
		$this->name=$name;
		$this->href=$href;
		$this->classValue=$classValue;
	}
}

$loginLink=new Link("Login","login","fa fa-lock");
$accountLink=new Link("Account","account","fa fa-user");

$isLoggedIn=false;

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
							<?php
							if($isLoggedIn) printf("<li><a href=\"%s\"><i class=\"%s\"></i>%s</a></li>",$accountLink->href,$accountLink->classValue,$accountLink->name);
							else printf("<li><a href=\"%s\"><i class=\"%s\"></i>%s</a></li>",$loginLink->href,$loginLink->classValue,$loginLink->name);
							?>
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
	<script type="text/javascript">
  	var list=[];

	function Listing()
  	{
  		var userString=document.getElementById("usernameInput").value;
  		document.getElementById("showlist").innerHTML='Input string: '+userString+'<br><br>Found usernames = ';
  		if(userString!="")
  		{
  			$.getJSON('search.php?callback=?',{"value":userString},function(data)
			{
				list=[];
		    	$.each(data, function(key, val)
		    	{
		    		list.push(val);
		    	});
			});
			Show();
  		}
  	}

  	function Show()
  	{
  		document.getElementById("list").innerHTML="";
  		document.getElementById("showlist").innerHTML+=list.length+'<br>';
  		document.getElementById("ulist").innerHTML="";
  		for(var i=0;i<list.length;i++)
  		{
  			document.getElementById("list").innerHTML+='<option value="'+list[i].username+'">';
  			document.getElementById("ulist").innerHTML+='<li>'+list[i].username+'</li>';
  		}
  	}
  	</script>
  	<div id="showlist"></div>
  	<ul id="ulist"></ul>
</header>