<?php
	session_start();
	mysql_connect("localhost","root","root");
	mysql_select_db("academics");
$regno=$_POST['regno'];
$subjectcode=$_POST['code'];
$erno=$_SESSION['sess_erno'];
$query="SELECT * FROM reg WHERE regno='$regno' AND code='$subjectcode'";
$result=mysql_query($query);
$count=mysql_num_rows($result);
if($count==0)
{
	$query="INSERT INTO reg (`regno`, `code`,`erno`) VALUES ('$regno','$subjectcode','$erno')";
	$result=mysql_query($query);
	$_SESSION['sess_query']=mysql_affected_rows();
	header('location:query.php');
	}
else
{
$_SESSION['sess_query']='0';
header('location:query.php');
}
?>