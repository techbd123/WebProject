<?php

header("Content-type: text/javascript");
header('Content-Type: application/json');

$username=NULL;
$email=NULL;
$password=NULL;
$callback=NULL;
$userid=NULL;
$isDeveloper=0;

if(isset($_GET['username'])) $username=$_GET['username'];
if(isset($_GET['email'])) $email=$_GET['email'];
if(isset($_GET['password'])) $password=$_GET['password'];
if(isset($_GET["callback"])) $callback=$_GET["callback"];

$serverName="localhost";
$serverUserName="appstore";
$serverPassword="appstore";
$databaseName="appstore";
$connection=mysqli_connect($serverName,$serverUserName,$serverPassword,$databaseName);
if($connection->connect_errno>0)
{
	die("connection failed! ".$connection->maxdb_connect_error);
}

function FindUP($connection,$username,$password)
{
	$found=false;	
	$sql="SELECT * FROM user WHERE username='$username' AND password=PASSWORD('$password')";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$found=true;
		$row=mysqli_fetch_assoc($result);
		$GLOBALS['userid']=$row['userid'];
		$GLOBALS['isDeveloper']=$row['isDeveloper'];
	}
	mysqli_free_result($result);
	return $found;
}

function FindEP($connection,$email,$password)
{
	$found=false;	
	$sql="SELECT * FROM user WHERE email='$email' AND password=PASSWORD('$password')";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$found=true;
		$row=mysqli_fetch_assoc($result);
		$GLOBALS['userid']=$row['userid'];
		$GLOBALS['isDeveloper']=$row['isDeveloper'];
	}
	mysqli_free_result($result);
	return $found;
}

if(FindUP($connection,$username,$password))
{
	$username=true;
	$email=false;
	$password=true;
}
else if(FindEP($connection,$email,$password))
{
	$username=false;
	$email=true;
	$password=true;
}
else
{
	$username=false;
	$email=false;
	$password=false;
}

$response=$callback."".json_encode(array('username' => $username, 'email' => $email, 'password' => $password, 'userid' => $userid, 'isDeveloper' => $isDeveloper))."";

mysqli_close($connection);

echo $response;
?>