<?php
include ('connection.php');
include ('function.php'); 
if(isset($_POST['submit']))
{	
  $hos_name= mysql_real_escape_string($_POST['hname']);
  $city= mysql_real_escape_string($_POST['city']);
  $state = mysql_real_escape_string($_POST['state']);
  $country = mysql_real_escape_string($_POST['country']);
  $hosregno=mysql_real_escape_string($_POST['regno']);

	 $result="INSERT INTO hospital_details(hos_name, hos_city, hos_state, hos_country, hos_regno)
              VALUES('$hos_name','$city','$state','$country','$hosregno');";
	 $retval=mysqli_query($connection,$result);	  

}
?>
<html lan="en">
	<head>
		<meta charset="utf-8"/>
		<title>Dengue</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="style1.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body background="img.jpg">
<nav class="navbar navbar-inverse navbar-fixed-top no-margin">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	       <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="about.php">About Us</a></li>
           </ul>
		   <ul class="nav navbar-nav navbar-right">
		      <li><a href="login.php">Log-In</a></li>
           </ul>
		   </div>
</nav>
<br><br><br><br><br><br>
<form method="POST" action="signup.php">
      Hospital-Name:<br><input type="text" name="hname" placeholder="Hospital Name" class="main" required /><br><br>
      City:<br><input type="text" name="city" placeholder="City" class="main" required /><br><br>
      State:<br><input type="text" name="state" placeholder="State" class="main" required /><br><br>
      Country:<br><input type="text" name="country" placeholder="Country" class="main" required /><br><br>
      Registration No.:<br><input type="text" name="regno" placeholder="Registration Number" class="main" required /><br><br>
      <input type="submit" name="submit" value="SIGN-UP" class="button">
</form>
</div>
</body>
</html>
