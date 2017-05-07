<?php

header("Content-type: text/javascript");
header('Content-Type: application/json');

$username=NULL;
$email=NULL;
$password=NULL;
$callback=NULL;

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

function FindPassword($connection,$x)
{
	$found=false;	
	$sql="SELECT * FROM user WHERE password=PASSWORD('$x')";
	$result=mysqli_query($connection,$sql);
	if(mysqli_num_rows($result)>0) $found=true;
	return $found;
}

$response=null;

if(FindUsername($connection,$username))
{
	$username=true;
	$email=false;	
}
else if(FindEmail($connection,$email))
{
	$username=false;
	$email=true;
}
else
{
	$username=false;
	$email=false;	
}

if(FindPassword($connection,$password)) $password=true;else $password=false;

$response=$callback."".json_encode(array('username' => $username, 'email' => $email, 'password' => $password))."";

mysqli_close($connection);

echo $response;
?>