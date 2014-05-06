

<?php


mysql_connect("localhost","root","root");
mysql_select_db("academics");


$regno1=$_REQUEST['regno'];
$subjectcode = $_REQUEST['code'];
$query="SELECT * FROM reg WHERE regno='$regno1' AND code='$subjectcode'";

$result=mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
if($row){
	print_r(json_encode($row));

}
else{
	echo "None";
}
?>