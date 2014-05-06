<?php
//Start session
session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if(isset($_SESSION['sess_username'])) 
{
	header("location: welcomefac.php");
}
?>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="./mystyle.css">
</head>
<script src="./jquery-1.10.1.min.js"></script>

<script>
	$(document).ready(function(){
		$("#login").fadeIn(2000);
		$(".topt").fadeIn(1000);
		$("#user").fadeIn(1000);
		$("#pass").fadeIn(1000);
		$(".footer").fadeIn(1000);
		$("#header").fadeIn(1000);
		
		console.log("checking for cookie");
		var user = getCookie("user");
		var pass = getCookie("pass");
		
		if (user!=null && user!="" && pass!=null && pass!="")
			{
				document.getElementById("user").value = user;
				document.getElementById("pass").value = pass;
			}
			
		else{
			console.log("No Cookie Found");
		}
		
			}); //end of document.ready
	
</script>
<script type="text/javascript">
function checkreg(){
	var developerMode = false;
	
	if(!developerMode){
		x = document.getElementById("user").value;
		
		if (!x){
			alert("Please fill in your Username.");
		}
}

}


function checkpsw(){
	var developerMode = false;
	
	if(!developerMode){
		x = document.getElementById("pass").value;
		
		if (!x){
			alert("Please fill in your password.")
		}
		else{
			cookieOperation();
		}
}}

function cookieOperation(){
	setCookie("user",document.getElementById("user").value,365);
	setCookie("pass",document.getElementById("pass").value,365);
	console.log("Cookies have been set!");
}

 
 function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1) {
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start, c_end));
    }
    return c_value;
}

function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}
</script>
<script>
var a=new Array("Vibhor Varshney","Rahul Rank","Jigar Kumar","Database Systems");
count=0;
function slide()
{
e=document.getElementById("message");
if(count==a.length)
count=0;
e.innerHTML=a[count++];
}
window.onload=function(){
	i=window.setInterval("slide()", 1000);
}
</script>

<body>
<div id="header">
<div id="logo">VITacademics</div>
<div id="navbar">
<li><a href="./faculty.php">Home</a></li>
<li><a href="./app.html">App</a></li>
<li><a href="./aboutus.html">About Us</a></li>
<li><a href="./contact.html">Feedback</a></li>
<li id="message">Vibhor Varshney</li>
</div>
</div>
<div id="container" align="center">
<div class="box" id="login">
	
	<h3 class="topt"> Faculty Login </h3>
	<form method="get" action="./loginfac.php">
	<input type="text" class="username" id="user" name="username" placeholder="Username" maxlength="9" onblur="checkreg()"><br/><br/>
	<input type="password" class="username" id="pass" name="password" placeholder="Password" maxlength="8" onblur="checkpsw()"><br><br/>
	<input  type="submit"  id="login-submit" class="butt" value=""/>
	<p id="checkin"><input id="rememberMe" type="checkbox" checked="true"> Remember me</p>
	</form>
	</div>
	
<div class="box" id="captcha">
	
	<h3 class="topt"> Enter the captcha</h3>
	<img id="captcha-image" style="width: 130px; height:25px; margin-left:30%;" src="">
	<br/><br/>
	<input type="text" class="username" id="captcha-text" placeholder="CAPTCHA" style="text-transform: uppercase;"><br/><br/>
	<button id="login-submit" class="butt" onclick="stepTwo()"></button>
	</div>

<!--  end of login procedure -->
	
	
</div>
	
	
	
	
	
<div class="footer">
<div id="newfoot" >
<li><a href="./support.html"> Support </a></li>
<li><a href="./terms& conditions.html"> Terms & Conditions</a></li>
<li><a href="./faqs.html">Help ! FAQs </a></li>
<li><a href="./legalpolicies.html">Legal Policies</a></li>
</div>
Copyright &copy 2013 . All rights reserved.
</div>
</body>
</html>
