<?php
header("Content-type: text/javascript");

$username=$_GET['username'];
$email=$_GET['email'];
$password=$_GET['password'];
$isDeveloper=0;
if($_GET['isDeveloper']=="true") $isDeveloper=1;

$serverName="localhost";
$serverUserName="appstore";
$serverPassword="appstore";
$databaseName="appstore";
$connection=mysqli_connect($serverName,$serverUserName,$serverPassword,$databaseName);
if($connection->connect_errno>0)
{
	die("connection failed! ".$connection->maxdb_connect_error);
}

class AppInfo
{	
	public $name;		
	public function __construct($name)
	{
		$this->name=$name;
	}
}

function FindUsername($connection,$x)
{
	$found=false;	
	$sql="SELECT * FROM user WHERE username ='$x'";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)>0) $found=true;
	return $found;
}

function FindEmail($connection,$x)
{
	$found=false;	
	$sql="SELECT * FROM user WHERE email ='$x'";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)>0) $found=true;
	return $found;
}

$response=null;

if(FindUsername($connection,$username)||empty($username))
{
	$response=$_GET["callback"]."(".json_encode(array('username' => false, 'email' => false)).")";	
}
else if(FindEmail($connection,$email)||empty($email))
{
	$response=$_GET["callback"]."(".json_encode(array('username' => true, 'email' => false)).")";
}
else
{
	$sql = "INSERT INTO `user` (`userid`, `username`, `email`, `password`, `isDeveloper`, `isVerified`, `joiningDate`) VALUES (NULL, '$username', '$email', PASSWORD('$password'), '$isDeveloper', '0', NOW())";
	$result=mysqli_query($connection,$sql);
	if($isDeveloper==1)
	{
		$result=mysqli_query($connection,"SELECT `userid` FROM `user` WHERE `username`='$username'");
		if(mysqli_num_rows($result)==1)
		{
			$userid=mysqli_fetch_array($result);
			$userid=$userid['userid'];
			$sql = "INSERT INTO `developer` (`developerid`, `userid`, `companyname`, `weblink`) VALUES (NULL, '$userid', NULL, NULL)";
			$result=mysqli_query($connection,$sql);
		}
	}
	$response=$_GET["callback"]."(".json_encode(array('username' => true, 'email' => true)).")";
}

echo $response;

mysqli_close($connection);
?>