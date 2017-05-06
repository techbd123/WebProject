<?php
	$bannerImageSrc="images/shop/advertisement.jpg";
	$categoryNames=array();
	$categoryItemLists=array();


	array_push($categoryNames,"Games");
	$categoryItemList=array("Action" => "#", 
							"Board" => "#",
							"Cards" => "#",
							"Puzzle" => "#",
							"Racing" => "#",
							"Casino" => "#");
	array_push($categoryItemLists,$categoryItemList);


	array_push($categoryNames,"Application");
	$categoryItemList=array("Education" => "#",
							"Entertainment" => "#",
							"Health and Fitness" =>"#",
							"Multimedia" => "#",
							"Photos and Videos" => "#",
							"Social" => "#",
							"Utilities" => "#");
	array_push($categoryItemLists,$categoryItemList);

	array_push($categoryNames,"Desktop");
	$categoryItemList=array("Security" => "#",
							"Entertainment" => "#",
							"Health and Fitness" =>"#",
							"Multimedia" => "#",
							"Photos and Videos" => "#",
							"Social" => "#",
							"Utilities" => "#");
	array_push($categoryItemLists,$categoryItemList);

	class Item
    {
    	public $name;
    	public $href;
    	function __construct($name,$href)
    	{
    		$this->name=$name;
    		$this->href=$href;
    	}
    }
	class Category
    {
        public $name;
        public $itemList;
        public $itemLength;

        public function __construct($name)
        {
            $this->name=$name;
            $this->itemList=array();
            $this->itemLength=0;
        }
        public function TakeNameWithItemList($name,$itemListArray)
        {
            $this->name=$name;
            $this->itemList=array();
            $this->itemLength=0;
            while($key=key($itemListArray))
            {
            	array_push($this->itemList,new Item($key,current($itemListArray)));
            	next($itemListArray);
            	$this->itemLength++;
            }
        }
        public function AddItemList($itemList)
        {
        	array_push($this->itemList,$itemList);
        	$itemLength+=count($itemList);		
        }
    }
    $category=array();
    $clen=count($categoryNames);
    $ilen=count($categoryItemLists);
    for($i=0;$i<$clen;$i++)
    {
    	$temp=new Category($categoryNames[$i]);
    	if($i<$ilen)
		{
			$temp->TakeNameWithItemList($categoryNames[$i],$categoryItemLists[$i]);
		}
    	array_push($category,$temp);
    }
?>

<!--section id="advertisement">
	<div class="container">
		<img src="<?php echo $bannerImageSrc ?>" alt="" />
	</div>
</section-->

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
						<!--/category-products-->
						<div class="panel-group category-products" id="accordian">
						<?php
							$categoryLength=count($category);
							for($i=0;$i<$categoryLength;$i++)
							{
								echo 
									'
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordian" href="#'.$category[$i]->name.'">
														<span class="badge pull-right"><i class="fa fa-plus"></i></span>'.$category[$i]->name.'</a>
												</h4>
											</div>

											<div id="'.$category[$i]->name.'" class="panel-collapse collapse">
												<div class="panel-body">
													<ul>';
								printf("\n");
								for($j=0;$j<$category[$i]->itemLength;$j++)
								{
									printf("\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"%s\">%s</a></li>\n",$category[$i]->itemList[$j]->href,$category[$i]->itemList[$j]->name);
								}
								echo '
													</ul>
												</div>
											</div>
										</div>';
							}
						?>
						</div>
				</div>
			</div>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Featured Apps</h2>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>1</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
							</div>
							<!--div class="choose">	
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
										<h2>2</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>3</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
								<!--!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>4</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
								<img src="images/home/new.png" class="new" alt="" />
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>5</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
								<img src="images/home/sale.png" class="new" alt="" />
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>6</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>7</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>8</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>

					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>9</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>

					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>10</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>


					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>11</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>

					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/android.jpg" alt="" />
									<h2>12</h2>
									<p>App Store</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
								</div>
								<div class="product-overlay">
									<!--div class="overlay-content">
										<h2>56</h2>
										<p>App Store</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
									</div-->
								</div>
							</div>
							<!--div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div-->
						</div>
					</div>

					
					<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>