
<html lan="en">
	<head>
		<meta charset="utf-8"/>
		<title>Dengue</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
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
	       <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="about.php">About Us</a></li>
           </ul>
		   
           <ul class="nav navbar-nav navbar-right">
		      <li><a href="signup.php">Sign-Up</a></li>
              <li><a href="login.php">Log-In</a></li>
           </ul>
    </div>
  </div>
</nav>
<!--nav-bar-ends-->
<div id="floating-panel">
      <button onclick="f1()">Undifferentiated fever</button>
      <button onclick="f2()">Dengue fever</button>
      <button onclick="f3()">Dengue Hemorrhagic fever</button>
	  <button onclick="f4()">Male</button>
	  <button onclick="f5()">Female</button>
    </div>
    <div id="map"></div>
	<?php
	include ('connection.php');
    include ('function.php'); 
	$count="select count('Patient_id') from patient_details";

$retval1=mysqli_query($connection,$count);
$cc=mysqli_fetch_row($retval1);
$alat=array();
$alng=array();
$query1="select world_cities_table.lat from world_cities_table, patient_details where world_cities_table.city=patient_details.City AND patient_details.Dengue_type='Undifferentiated fever'";
$query2="select world_cities_table.lng from world_cities_table, patient_details where world_cities_table.city=patient_details.City AND patient_details.Dengue_type='Undifferentiated fever'";
$result1=mysqli_query($connection, $query1);
$result2=mysqli_query($connection, $query2);
$i=0;
while($row=mysqli_fetch_assoc($result1))
{
$alat[]=$row['lat'];
if($i==$cc[0])
	break;
$i=$i+1;
	
}
$i=0;
while($row=mysqli_fetch_assoc($result2))
{
$alng[]=$row['lng'];
if($i==$cc[0])
	break;
$i=$i+1;	
}

echo $cc[0];
echo $i;

	?>
    <script>

var map, heatmap;
var lat=<?php echo json_encode($alat);?>;
var lng=<?php echo json_encode($alng);?>;
var c='<?php echo $i;?>';

document.write(c);
var j;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 2,
    center: {lat: 37.775, lng: -122.434},
    mapTypeId: google.maps.MapTypeId.SATELLITE
  });

 for(j=0;j<c;j++)
 {  
heatmap = new google.maps.visualization.HeatmapLayer({ data: getPoints(),map: map});
}
}

function f1() {
 window.location="filter1.php";
}

function f2() {
  window.location="filter2.php";
}

function f3() {
window.location="filter3.php";  
}

function f4() {
window.location="filter4.php";  
}

function f5() {
window.location="filter5.php";  
}
function getPoints() {
  return [
  new google.maps.LatLng(lat[j],lng[j]),
  ];
}
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPlDFb8ZNNM0z3HW2QmLJ6jZL4N2WfBNQ&signed_in=true&libraries=visualization&callback=initMap">
    </script>
</body>
</html>
