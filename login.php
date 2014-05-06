<?php
session_start();
mysql_connect("localhost","root","root");
mysql_select_db("academics");
$regno=$_GET['regno'];
$passw=$_GET['password'];
$query="SELECT * FROM student WHERE regno='$regno' AND dob='$passw'";
$result=mysql_query($query);
$count=mysql_num_rows($result);
if($count==1)
{
	$_SESSION['sess_regno'] = $_GET['regno'];	
	header('Location:welcome.php');
	}
else
{
header('Location:accessd.php');
}
mysql_close();
?>