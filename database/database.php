<?php

echo "database creation<br>";

$sqlFilename="appstore.sql";

$serverName="localhost";
$serverUserName="appstore";
$serverPassword="appstore";
$databaseName="appstore";

$connection=mysqli_connect($serverName,$serverUserName,$serverPassword);
if($connection->connect_error)
{
	die("connection failed! ".$connection->maxdb_connect_error);
}

	
$sql="CREATE DATABASE IF NOT EXISTS $databaseName;";
$sql.="USE $databaseName;";

$sqlFile=fopen($sqlFilename,"r") or die("Unable to open the file ".$sqlFilename);

$sql.=fread($sqlFile,filesize($sqlFilename));

fclose($sqlFile);

printf("%s<br>\n",$sql);

$result=mysqli_multi_query($connection,$sql);

printf("%d<br>\n",$result);

mysqli_close($connection);
?>