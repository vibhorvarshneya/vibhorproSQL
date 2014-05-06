<html>
<head>
<style>
body
  {
  width:100%;
  height:100%;
  margin:0px;
  position:fixed;
 background: url("background.png");
	background-attachment: fixed;
	background-size: contain;
  }
  
  #container{
	  
	 border:10px solid white;
	 width: 1420px;
	 height:808px; 
	 position: relative;
  }
 #box1{
	 width:200px;
	 height:200px;
	 background:white;
	 position: relative;
	 border-radius:50%;
	 top:20px;
	 font-family: "Helvetica Neue",sans-serif;
	font-weight: 200;
	font-size:25px;
	 left:-100px;
	 color:black;
	 line-height:8;
 }

 #box2{
	 width:200px;
	 height:200px;
	 background:white;
	 position: relative;
	 border-radius:50%;
	 line-height:8;
	 font-family: "Helvetica Neue",sans-serif;
	font-weight: 200;
	font-size:25px;
	 top:-180px;
	 left:120px;
	 color:black;
 }
 
 a{
	 text-decoration: none;
	 color:black;
	 display:block;
 }
 
a:hover{
	color:red;
}
 h2{
	 font-family: "Helvetica Neue",sans-serif;
	 width:100%;
	 height:200px;
	 font-size: 100px;
	 font-weight: 200;
	 line-height: 2;
	color:white;
	 top:-40px;
	 position: relative;
 }
 
#box1:hover {
  background-color: white;
  -webkit-animation-name: greenPulse;
  -webkit-animation-duration: 1s;
  -webkit-animation-iteration-count: 1;
  -webkit-box-shadow: 0 0 70px white;
}

#box2:hover {
  background-color: white;
  -webkit-animation-name: greenPulse;
  -webkit-animation-duration: 1s;
  -webkit-animation-iteration-count: 1;
  -webkit-box-shadow: 0 0 70px white;
}

@-webkit-keyframes greenPulse {
  from { background-color:white; -webkit-box-shadow: 0 0 0 #333; }
  to { background-color: white; -webkit-box-shadow: 0 0 70px white; }
}

</style>
</head>

<body>
<div align="center" id="container">
<h2>VIT Academics</h2>
<div id="box1">
<a href="./index.php">Student Login</a>
</div>
<div id="box2">
<a href="./faculty.php">Faculty Login</a>
</div>
</div>
</body>
</html>