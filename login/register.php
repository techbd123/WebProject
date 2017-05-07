<?php
header("Content-type: text/javascript");

$username=$_GET['username'];
$email=$_GET['email'];
$password=$_GET['password'];
$isDeveloper=$_GET['isDeveloper'];

class AppInfo
{	
	public $name;		
	public function __construct($name)
	{
		$this->name=$name;
	}
}

function Find($x)
{
	$userList=array();
	$serverName="localhost";
	$serverUserName="appstore";
	$serverPassword="appstore";
	$databaseName="appstore";
	$connection=mysqli_connect($serverName,$serverUserName,$serverPassword,$databaseName);
	if($connection->connect_errno>0)
	{
		die("connection failed! ".$connection->maxdb_connect_error);
	}
	$sql="SELECT * FROM user WHERE username ='$x'";
	$table=mysqli_query($connection,$sql);
	$numRows=mysqli_num_rows($table);
	if($numRows>0)
	{
		$i=0;
		while($row=mysqli_fetch_array($table))
		{
			$userList[]=new AppInfo($row["name"]);
			$i++;
			if($i==10) break;
		}
	}
	mysqli_close($connection);
	return $userList;
}
$response=$_GET["callback"]."(".json_encode(Find($userString)).")";
echo $response;
?>