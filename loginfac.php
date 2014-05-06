<?php
session_start();
mysql_connect("localhost","root","root");
mysql_select_db("academics");
$erno=$_GET['username'];
$passw=$_GET['password'];
$query="SELECT * FROM faculty WHERE erno='$erno' AND password='$passw'";
$result=mysql_query($query);
$count=mysql_num_rows($result);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
if($count==1)
{
	$_SESSION['sess_erno'] = $_GET['username'];
	header('Location:welcomefac.php');
	}
else
{
header('Location:accessd.php');
}
mysql_close();
?>