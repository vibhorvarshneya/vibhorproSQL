<?php
	session_start();
	mysql_connect("localhost","root","root");
	mysql_select_db("academics");
$regno=$_POST['regno'];
$cat1=$_POST['cat1'];
$cat2=$_POST['cat2'];
$quiz1=$_POST['quiz1'];
$quiz2=$_POST['quiz2'];
$quiz3=$_POST['quiz3'];
$assignment=$_POST['assignment'];
$termend=$_POST['termend'];
$subjectcode=$_POST['code'];
$query="SELECT * FROM reg WHERE regno='$regno' AND code='$subjectcode'";
$result=mysql_query($query);
$count=mysql_num_rows($result);

if($count==1)
{
	$query="UPDATE reg SET cat1='$cat1',cat2='$cat2',quiz1='$quiz1',quiz2='$quiz2',quiz3='$quiz3',assignment='$assignment',termend='$termend' WHERE regno='$regno' AND code='$subjectcode'";
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