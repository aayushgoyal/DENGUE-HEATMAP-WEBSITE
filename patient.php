<?php
session_start();
include ('connection.php');
include ('function.php'); 
$error=' ';
if(isset($_POST['submit']))
{	
  $p_name= mysql_real_escape_string($_POST['name']);
  $p_age= mysql_real_escape_string($_POST['age']);
  $p_sex= mysql_real_escape_string($_POST['sex']);
  $city= mysql_real_escape_string($_POST['city']);
  $state = mysql_real_escape_string($_POST['state']);
  $country = mysql_real_escape_string($_POST['country']);
  $blood=mysql_real_escape_string($_POST['blood']);
  $dengue=mysql_real_escape_string($_POST['dengue']);

	 $result="INSERT INTO patient_details(Name, Sex, Age, City, State, Country, Blood_group, Dengue_type)
              VALUES('$p_name','$p_sex','$p_age','$city','$state','$country','$blood','$dengue');";
	 $retval=mysqli_query($connection,$result);	  
	 $error='Successfuly Registered';
}
else
{
	$error='Sorry...not registered';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lan="en">
	<head>
		<meta charset="utf-8"/>
		<title>Dengue</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="xxx1.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
</head>
<body background="img.jpg">
<!--nav-bar-start-->
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
		   <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php">Logout</a></li>
           </ul>
    </div>
  </div>
</nav>
<!--nav-bar-ends-->
<br><br><br><br>
<h1>Patient Details</h1>
<form method="post" action="patient.php">
      Name:<br><input type="text" name="name" placeholder="Patient Name" class="main" required /><br><br>
      Age:<br><input type="text" name="age" placeholder="Age" class="main" required /><br><br>
      Sex:<br><select type="text" name="sex" class="main" required />
	          <option value="male">Male</option>
	          <option value="female">Female</option>
	          </select> <br><br>
     <?php
        include('connection.php');
        echo ' Country:';
		$sql = "SELECT distinct(country) FROM world_cities_table";
        $result = mysqli_query($connection,$sql);
        echo '<br/>';
	    echo '<select name="country" type="text" class="main">';
        while($row = mysqli_fetch_array($result))
                {
                  echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';
                }
        echo '</select>';
        echo '<br/>';

		
       $sql = "SELECT distinct(province) FROM world_cities_table";
       echo ' State:';
        $result = mysqli_query($connection,$sql);
        echo '<br/>';
	  echo '<select name="state" type="text" class="main">';
	  
        while($row = mysqli_fetch_array($result))
                {
                  echo '<option value="'.$row['province'].'">'.$row['province'].'</option>';
                }
echo '</select>';
echo '<br/>';
$sql = "SELECT distinct(city) FROM world_cities_table";
       echo ' City:';
        $result = mysqli_query($connection,$sql);
        echo '<br/>';
	  echo '<select name="city" type="text" class="main">';
	  
        while($row = mysqli_fetch_array($result))
                {
                  echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
                }
echo '</select>';
echo '<br/>';
        ?>
	  
	  
	  <br>
	 
	  
	  Blood Group:<br><select type="text" name="blood" class="main" required />
	          <option value="A">A</option>
	          <option value="A+">A+</option>
	          <option value="A-">A-</option>
	          <option value="B">B</option>
	          <option value="B+">B+</option>
	          <option value="B-">B-</option>
	          <option value="O">O</option>
	          <option value="O+">O+</option>
	          <option value="O-">O-</option>
	          <option value="AB">AB</option>
	          </select> <br><br>
	 Dengue Type:<br><select type="text" name="dengue" class="main" required />
	          <option value=" "></option>
	          <option value="Undifferentiated fever">Undifferentiated fever</option>
	          <option value="Dengue fever">Dengue fever</option>
	          <option value="Dengue Hemorrhagic fever">Dengue Hemorrhagic fever</option>
	          </select> <br>
          <input type="submit" name="submit" value="Register" class="button">
</form>
<div id="error_bar">          
         <?php
            echo $error ;
         ?>
       </div>
</body>
</html>
