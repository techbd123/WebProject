<?php

header("Content-type: text/javascript");
header('Content-Type: application/json');

$name=NULL;
$category=NULL;
$subcategory=NULL;
$version=NULL;
$applogolink=NULL;
$appfilelink=NULL;
$userid=NULL;
$callback=NULL;

if(isset($_GET['name'])) $name=$_GET['name'];
if(isset($_GET['category'])) $category=$_GET['category'];
if(isset($_GET['subcategory'])) $subcategory=$_GET['subcategory'];
if(isset($_GET['version'])) $version=$_GET['version'];
if(isset($_GET['applogolink'])) $applogolink=$_GET['applogolink'];
if(isset($_GET['appfilelink'])) $appfilelink=$_GET['appfilelink'];
if(isset($_GET['userid'])) $userid=$_GET['userid'];
if(isset($_GET['callback'])) $callback=$_GET['callback'];

$serverName="localhost";
$serverUserName="appstore";
$serverPassword="appstore";
$databaseName="appstore";
$connection=mysqli_connect($serverName,$serverUserName,$serverPassword,$databaseName);
if($connection->connect_errno>0)
{
	die("connection failed! ".$connection->maxdb_connect_error);
}

function FindDeveloperId($connection,$userid)
{
	$found=NULL;	
	$sql="SELECT developerid FROM developer WHERE userid ='$userid'";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$found=mysqli_fetch_assoc($result);
		$found=$found['developerid'];
	}
	mysqli_free_result($result);
	return $found;
}

$developerid=FindDeveloperId($connection,$userid);

$sql = "INSERT INTO `appinfo` (`appid`, `name`, `category`, `subcategory`, `developerid`, `version`, `applogolink`, `appfilelink`, `lastupload`) VALUES (NULL, '$name', '$category', '$subcategory', '$developerid', '$version', '$applogolink', '$appfilelink', NOW())";
$result=mysqli_query($connection,$sql);

$res=false;

if($result) $res=true;

mysqli_free_result($result);

$response=$callback."".json_encode(array('result' => $res))."";

mysqli_close($connection);

echo $response;
?>