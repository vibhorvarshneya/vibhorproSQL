<?php
//Start session
session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_erno'])) 
{
	header("location: faculty.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
<style>
body{
	background: url("background.png");
	background-attachment: fixed;
	background-size: contain;
	width: 100%;
	height: 100%;
	font-family: "Helvetica Neue",sans-serif;
	font-weight: 100;
	margin:0px;
}

.butt{
	width: 70px;
	height: 70px;
	font-size: 15px;
	border:none;
	background:white;
	border-radius:50%;
	margin-left:5px;
	display:inline-block;
	line-height:4.5;
	font-weight:initial;
}

.butt1{
	width: 100px;
	height:40px;
	font-size: 15px;
	border:none;
	background:-webkit-linear-gradient(#3c42e2 0%, #ffffff 150%);
	margin-left:5px;
	font-weight:initial;
}

a{
	text-decoration:none;
	color:black;
	display:block;
}
</style>
</head>
<body>
<?php
echo "<h1 align='center' style='width:100%; height:50px; top: -22px; position: relative; color:white;font-weight:initial; font-size: 34px; background:-webkit-linear-gradient(#0078c3 0%, #ffffff 160%); line-height:1.5'>";
mysql_connect("localhost","root","root");
mysql_select_db("academics");
$userm=$_SESSION['sess_erno'];
$query="SELECT * FROM faculty WHERE erno='$userm'";
$result=mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$query2="SELECT c.code,c.title FROM course c WHERE c.code IN (SELECT t.code FROM take t WHERE t.erno='$userm')";
$result2=mysql_query($query2);
$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);

echo "WELCOME,&nbsp".$row['name'];
echo "</h1>";
echo "<div align='center'>";
echo "<h3 style='font-weight:initial'><u>TITLE:&nbsp".$row2['title']."&nbsp(".$row2['code'].")</u></h3>";
				echo "<span class='butt'>";
				echo "<a href='welcomefac.php' name='change'>Home</a></span>";
				echo "<span class='butt'>";
				echo "<a href='addform.php' name='change'>Add</a></span>";
				echo "<span class='butt'>";
				echo "<a href='deleteform.php' name='change'>Delete</a></span>";
				echo "<span class='butt'>";
				echo "<a href='updateform.php' name='change'>Update</a></span>";
				echo "</div>";
echo "<br/>";
echo "<div align='center' style='color:white;'>";
echo "<h3 style='font-weight:initial'><u>LIST OF STUDENTS</u></h3>";
mysql_connect("localhost","root","root");
mysql_select_db("academics");
$erm=$_SESSION['sess_erno'];
$query="SELECT * FROM reg WHERE erno='$erm'";
$result=mysql_query($query);
echo "<table cellpadding='4' border='1' cellspacing='4' style='color:black; font-weight:initial; font-size:20px;border-collapse:collapse;background:white; border-color:grey'>";
echo "<tr>
<th>REGISTRATION NUMBER</th>
<th>NAME</th>
<th>CAT 1</th>
<th>CAT 2</th>
<th>QUIZ 1</th>
<th>QUIZ 2</th>
<th>QUIZ 3</th>
<th>ASSIGNMENT</th>
<th>TERMEND</th>
  </tr>";
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo "<tr>";    
echo "<td>";
echo $row["regno"];
echo "</td>";
$studreg=$row["regno"];
$query1="SELECT name FROM student WHERE regno='$studreg'";
$result1=mysql_query($query1);
while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
 echo "<td>";
echo $row1["name"];
echo "</td>";
}
echo "<td>";
echo $row["cat1"];
echo "</td>";
echo "<td>";
echo $row["cat2"];
echo "</td>"; 
echo "<td>";
echo $row["quiz1"];
echo "</td>";
echo "<td>";
echo $row["quiz2"];
echo "</td>";
echo "<td>";
echo $row["quiz3"];
echo "</td>";  
echo "<td>";
echo $row["assignment"];
echo "</td>";  
echo "<td>";
echo $row["termend"];
echo "</td>";    
echo "</tr>";
}
echo "</table>";
echo "</div>";
?>
<div align="center" style="position:relative; top:20px;">
<div class="butt1" align="center" style="line-height:2.5;"><a href="logoutf.php" style="text-decoration:none;color:white; display:block;">Logout</a></div>
</div>
</body>
</html>