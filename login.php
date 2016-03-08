<?php
include ('connection.php');
include ('function.php'); 
$error=' ';
if(logged_in()){
	  header("location:patient.php");
	  exit();
  }
  
if(isset($_POST['submit']))
{	
  $hos_regno= mysql_real_escape_string($_POST['hregno']);
  $password= mysql_real_escape_string($_POST['password']);
  $retval=mysqli_query($connection,"SELECT hos_password FROM hospital_details WHERE hos_regno='$hos_regno';");	  
	 $retrievepass = mysqli_fetch_assoc($retval);
			if($password === $retrievepass['hos_password'])
			{
				$_SESSION['hregno']=$hos_regno;
				header("location:patient.php");
			}
			else
			{
		        $error='Password is incorrect.';
			}
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
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About Us</a></li>
           </ul>
		   <ul class="nav navbar-nav navbar-right">
		      <li><a href="signup.php">Sign-Up</a></li>
           </ul>
		   </div>
</nav>
<br><br><br><br><br><br>

<form method="post" action="login.php">
      Hospital Registration No.:<br><input type="text" name="hregno" placeholder="Registration No." class="main" required /><br><br>
      Password:<br><input type="password" name="password" placeholder="******" class="main" required /><br><br>
      <input type="submit" name="submit" value="LOGIN" class="button">
</form>
<div id="error_bar">          
         <?php
            echo $error ;
         ?>
       </div>
</div>
</body>
</html>
