<?php
//Start session
session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_regno'])) 
{
	header("location: index.php");
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
	#position: fixed;
	background: url("background.png");
	background-attachment: fixed;
	background-size: contain;
	width: 100%;
	height: 100%;
	#color:white;
	font-family: "Helvetica Neue",sans-serif;
	font-weight: 100;
	margin:0px;
}

.flip-container {
			-webkit-perspective: 1000;
			-moz-perspective: 1000;
			perspective: 1000;
	display:inline-block;
			border:none;
			#border-radius:40px;
		}

			
			 .flip-toggle.flip .flipper{
				-webkit-transform: rotateY(180deg);
				-moz-transform: rotateY(180deg);
				transform: rotateY(180deg);
				filter: FlipH;
    			-ms-filter: "FlipH";
			}

		.flip-container, .front, .back {
			width: 350px;
			height: 350px;
			margin:1px;
		}

		.flipper {
			-webkit-transition: 0.6s;
			-webkit-transform-style: preserve-3d;

			-moz-transition: 0.6s;
			-moz-transform-style: preserve-3d;

			transition: 0.6s;
			transform-style: preserve-3d;

			position: relative;
		}

		.front, .back {
			-webkit-backface-visibility: hidden;
			-moz-backface-visibility: hidden;
			backface-visibility: hidden;

			position: absolute;
			top: 0;
			left: 0;
		}

		.front {
			background: white;
			z-index: 2;
			border-radius:40px;
		}

		.back {
			background:white;
			-webkit-transform: rotateY(180deg);
			-moz-transform: rotateY(180deg);
			transform: rotateY(180deg);
			border-radius:40px;
		}

		.front .name {
			font-size: 2em;
			display: inline-block;
			background: white;
			color: #f8f8f8;
			font-family: Courier;
			padding: 5px 10px;
			border-radius:4px;
			bottom: 60px;
			left: 25%;
			position: absolute;
			text-shadow: 0.1em 0.1em 0.05em #333;

			-webkit-transform: rotate(-20deg);
			-moz-transform: rotate(-20deg);
			transform: rotate(-20deg);
		}
	#sexyButton{
		width:90px;
		height:40px;
		border:none;
		background:-webkit-linear-gradient(#3c42e2 0%, #ffffff 150%);
		font-size:15px;
		color:white;
		left:10px;
		top:-35px;
		position:relative;
	}
	
	#sexyButton1{
		width:90px;
		height:40px;
		border:none;
		background:-webkit-linear-gradient(#3c42e2 0%, #ffffff 150%);
		font-size:15px;
		color:white;
		right: 10px;
		float: right;
		top:-35px;
		position:relative;
		text-align:center;
	}
		.calculationButton{
					width: 40px;
					height: 40px;
					border: none;
					font-size: 15px;
					margin: 2px;
					border-radius: 50%;
					background: lightgrey;
		} 
</style>
<script src="./jquery-1.10.1.min.js"></script>
<script>
function change1()
{
document.querySelector('.flip-toggle').classList.toggle('flip');
if(document.getElementById("sexyButton").innerHTML=="Details")
{
document.getElementById("sexyButton").innerHTML="Marks";
}
else if(document.getElementById("sexyButton").innerHTML=="Marks")
{
document.getElementById("sexyButton").innerHTML="Details";
}
}
</script>

<script>

$(document).ready(function(){
	calculateFresh();
})

function slotsDetector(){
	return 1;
}

function calculateFresh(){
	
	for(i = 0 ; i < $(".attendancePercentage").length ; i++){
		var attended = parseInt($($(".attendedNumber")[i]).html());
			    var conducted = parseInt($($(".conductedNumber")[i]).html());
			    
			    var newPercentage = ((attended/conducted)*100);
			    var newPercentageString = String(Math.round(newPercentage)) + "%";
			    $($(".attendancePercentage")[i]).html(newPercentageString);
	}
}

function attendPlus(i){
    	var slots = slotsDetector();
	    var indicated = parseInt($($(".attendIndicator")[i]).html());
	    var newIndication = indicated + slots;
	    $($(".attendIndicator")[i]).html(newIndication);
	    
	    var attended = parseInt($($(".attendedNumber")[i]).html());
	    var conducted = parseInt($($(".conductedNumber")[i]).html());
	    
	    var displayedAttended = attended - indicated + newIndication;
	    var displayedConducted = conducted - indicated + newIndication;
	    
	    $($(".attendedNumber")[i]).html(String(displayedAttended));
	    $($(".conductedNumber")[i]).html(String(displayedConducted));
	    
	    calculateFresh();   
    }

function attendMinus(i){
	var indicated = parseInt($($(".attendIndicator")[i]).html());
	var attended = parseInt($($(".attendedNumber")[i]).html());
	var conducted = parseInt($($(".conductedNumber")[i]).html());
	
    if(indicated >0){
    	var slots = slotsDetector();
	    var indicated = parseInt($($(".attendIndicator")[i]).html());
	    var newIndication = indicated - slots;
	    $($(".attendIndicator")[i]).html(newIndication);
	    	    
	    var displayedAttended = attended - indicated + newIndication;
	    var displayedConducted = conducted - indicated + newIndication;
	    
	    $($(".attendedNumber")[i]).html(String(displayedAttended));
	    $($(".conductedNumber")[i]).html(String(displayedConducted));
	    
	    calculateFresh();
	    
	    }//end of 'if'
    }

//MISSES
        function missPlus(i){
        var attended = parseInt($($(".attendedNumber")[i]).html());
	    var conducted = parseInt($($(".conductedNumber")[i]).html());
        
    	var slots = slotsDetector();
	    var indicated = parseInt($($(".missIndicator")[i]).html());
	    var newIndication = indicated + slots;
	    $($(".missIndicator")[i]).html(newIndication);
	    
	    var displayedConducted = conducted - indicated + newIndication;
	    
	    $($(".conductedNumber")[i]).html(String(displayedConducted));
	    
	    calculateFresh();
    }
    
    function missMinus(i){
    var attended = parseInt($($(".attendedNumber")[i]).html());
	var conducted = parseInt($($(".conductedNumber")[i]).html());
	var indicated = parseInt($($(".missIndicator")[i]).html());
	
    if(indicated >0){
    	var slots = slotsDetector();
	    var indicated = parseInt($($(".missIndicator")[i]).html());
	    var newIndication = indicated - slots;
	    $($(".missIndicator")[i]).html(newIndication);
	    
	    var displayedConducted = conducted - indicated + newIndication;
	    
	    $($(".conductedNumber")[i]).html(String(displayedConducted));

	    calculateFresh();
	    }//end of 'if'
    }



</script>

</head>
 
<body>
<h1 align="center" style="width:100%; height:50px; top: -22px; position: relative; color:white;font-weight:initial; font-size: 34px; background:-webkit-linear-gradient(#0078c3 0%, #ffffff 160%);">Welcome,
 <?php
mysql_connect("localhost","root","root");
mysql_select_db("academics");
$regno1=$_SESSION['sess_regno'];
$query="SELECT * FROM student WHERE regno='$regno1'";
$result=mysql_query($query);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf($row["name"]);
}

mysql_free_result($result);
?></h1>
<button onclick="change1()" id="sexyButton">Details</button>
<div id="sexyButton1"><a href="logout.php" style="text-decoration:none; top:10px; position:relative; color:white; font-weight:300;">Logout</a></div>
<div class="flip-toggle" align="center" style="width:100%; height:100%; top: -23px;
position: relative;">
<?php
mysql_connect("localhost","root","root");
mysql_select_db("academics");
$regno1=$_SESSION['sess_regno'];
$query="SELECT * FROM reg WHERE regno='$regno1'";
$result=mysql_query($query);
$i=0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	echo "<div class='flip-container'>";
	echo "<div class='flipper'>";
	echo "<div class='front'>";
	echo "<h3 class='topt' style='font-weight:400; font-size:27px; height:12px;'>";
	echo "<u>".$row["code"]."</u>";
	echo "</h3>";
	echo "<table cellpadding='2' cellspacing='2' style='font-size:20px; font-weight:initial;'>";
	$subcode=$row["code"];
	$query2="SELECT f.name FROM faculty f WHERE f.erno IN (SELECT t.erno FROM take t WHERE t.code='$subcode' )";
		$result2=mysql_query($query2);
		while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
			echo "<tr><td>";    
								echo "Faculty:";
								echo "</td><td>";
									echo $row2["name"];
									echo "</td></tr>";
		}
	$query1="SELECT * FROM course WHERE code='$subcode'";
	$result1=mysql_query($query1);
	while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
					echo "<tr><td>";    
					echo "Title:";
					echo "</td><td>";
						echo $row1["title"];
						echo "</td></tr>";
						
										echo "<tr><td>";    
										echo "School:";
										echo "</td><td>";
											echo $row1["school"];
											echo "</td></tr>";
											echo "<tr><td>";    
																echo "Credit:";
				echo "</td><td>";
				echo $row1["credit"];
				echo "</td></tr>";
																	
																	echo "<tr><td>";    
					echo "Type:";
					echo "</td><td>";
					echo $row1["type"];
					echo "</td></tr>";
											
											
	}
											echo "</table>";		

	echo "</div>";
	echo "<div class='back'>";
	echo "<h3 style='font-weight:400; font-size:27px; height:12px; color: rgb(16, 150, 255);'><u>Marks</u></h3>";
	echo "<table cellpadding='2' cellspacing='2' style='font-size:20px; font-weight:initial;'>";
			echo "<tr><td>";    
				echo "CAT-I:";
				echo "</td><td>";
					echo $row["cat1"];
					echo "</td></tr>";
					
				echo "<tr><td>";    
					echo "CAT-II:";
					echo "</td><td>";
						echo $row["cat2"];
						echo "</td></tr>";
						
				echo "<tr><td>";    
				echo "TERM END:";
				echo "</td><td>";
				echo $row["termend"];
				echo "</td></tr>";
				
					echo "<tr><td>";    
						echo "QUIZ-I:";
						echo "</td><td>";
							echo $row["quiz1"];
							echo "</td></tr>";
							
							echo "<tr><td>";    
								echo "QUIZ-II:";
								echo "</td><td>";
									echo $row["quiz2"];
									echo "</td></tr>";
									
									echo "<tr><td>";    
										echo "QUIZ-III:";
										echo "</td><td>";
											echo $row["quiz3"];
											echo "</td></tr>";
		
											echo "<tr><td>";    
											echo "ASSIGNMENT:";
											echo "</td><td>";
												echo $row["assignment"];
												echo "</td></tr>";
												
			echo "</table>";		
	echo "</div>";
	echo "</div>";
	echo "</div>";
	$i += 1;
}
?>
</div>
</body>
</html>