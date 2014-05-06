<?php
//Start session
session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_erno'])) 
{
	header("location:faculty.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="./jquery-1.10.1.min.js"></script>
<title>Add Form</title>
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
.formadd{
	width:100%;
	height:100%;
	position:relative;
	top:20px;
}
.butt{
	position: relative;
	top: 10px;
	font-weight: 100;
	min-width: 80px;
	width: 280px;
	min-height: 40px;
	font-size: 18px;
	border-radius: 10px;
			color:white;
			background:-webkit-linear-gradient(#3c42e2 0%, #ffffff 150%);
			border: 0px inset gray;
}
.butt1{
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
.textbox{
    background:url("background.png");
    border-radius: 2em;
    border: none;
    padding: 0.8em;
    color:white;
		margin:8px;
    font-size: 1.1em;
    padding-left: 1.5em;
    outline: none;
    box-shadow: 0 6px 9px -5px hsl(0, 0%, 40%), inset 0px 4px 7px -5px hsl(0, 0%, 2%);
}
::-webkit-input-placeholder { /* WebKit browsers */
    color: white;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color: white;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    color: white;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
    color: white;
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
mysql_connect("localhost","root","root");
mysql_select_db("academics");
$userm=$_SESSION['sess_erno'];
$query2="SELECT c.code,c.title FROM course c WHERE c.code IN (SELECT t.code FROM take t WHERE t.erno='$userm')";
$result2=mysql_query($query2);
$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);

		echo "<h1 align='center' style='width:100%; height:50px; top: -22px; position: relative; color:white;font-weight:initial; font-size: 34px; background:-webkit-linear-gradient(#0078c3 0%, #ffffff 160%); line-height:1.5'>ADD A STUDENT</h1>";
		echo "<div align='center'>";
		echo "<h3 style='font-weight:initial'><u>TITLE:&nbsp".$row2['title']."&nbsp(".$row2['code'].")</u></h3>";
						echo "<span class='butt1'>";
						echo "<a href='welcomefac.php' name='change'>Home</a></span>";
						echo "<span class='butt1'>";
						echo "<a href='addform.php' name='change'>Add</a></span>";
						echo "<span class='butt1'>";
						echo "<a href='deleteform.php' name='change'>Delete</a></span>";
						echo "<span class='butt1'>";
						echo "<a href='updateform.php' name='change'>Update</a></span>";
						echo "</div>";
		echo "<br/>";
	echo "<div class='formadd' align='center'>";
	echo "<form method='post' action='add.php'>";
	echo "<input type='text' class='textbox' name='regno' style='text-transform: uppercase;' placeholder='Registration Number' maxlength='10'>";
	echo "<br/>";
	echo "<input type='text' class='textbox' name='code' style='text-transform: uppercase;' placeholder='Subject Code' maxlength='20'>";
		echo "<br/>";		
	echo "<input type='submit' class='butt' value='Add'/>";
	echo "</form>";
	echo "</div>";
?>
</body>
</html>