<?php

$serverName="localhost";
$serverUserName="appstore";
$serverPassword="appstore";
$databaseName="appstore";
$connection=mysqli_connect($serverName,$serverUserName,$serverPassword,$databaseName);
if($connection->connect_errno>0)
{
die("connection failed! ".$connection->maxdb_connect_error);
}

$sql="SELECT * FROM `appinfo` ORDER BY `appinfo`.`name` ASC LIMIT 12";

$result=mysqli_query($connection,$sql);


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

mysqli_close($connection);
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
					<?php
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
							echo 
							'
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="'.$row['applogolink'].'" height="100" width="180" alt="" />
												<h2>'.$row['name'].'</h2>
												<a href="'.$row['appfilelink'].'" class="btn btn-default add-to-cart"><i class="fa fa-download"></i>Download</a>
											</div>
										</div>
									</div>
								</div>
							';
						}
					}
					?>
					<!--ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul-->
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>