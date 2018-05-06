<!DOCTYPE html>
<html>
<head>
	<title>London Crime Map</title>
	<meta charset="UTF-8">
	<style type="text/css">
		#mapid { height: 300px; width: 400px; float: left; margin: 10px; border: thin solid black;}
	</style>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
  integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
  crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
  integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
  crossorigin=""></script>	<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<!--	
	<link rel="stylesheet" <!--href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" 
   href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"/>
  integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
  crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
  integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
  crossorigin=""></script> 
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>-->
	<?php include("all_crimedata_mapdata.php"); ?>
	<script src="all_crimedata_maplogic.js"></script>
</head>

<body onload=initialise()>
	<h1>London Crime Map</h1>
	
	<p>This is a map of the locations of crimes that occured in 
	The City of London and its peripheries, during a three-month 
	period, from 1 January 2018 to 30 March 2018. <br><br>
	Note: There are less markers than there were crimes, as many
	crimes occured in the same location, which is marked only once.</p>
	
    <div id="mapid"></div>
	<h3>Data Selection</h3>
	
	<?php  
		echo "<form action='".$_SERVER['SCRIPT_NAME']."' method='get'>";
	?>

<!-- Options for viewing the map according to crime type-->	
	<p>Select crime type:<br>
	<input type=radio name=filter_crime_type value=0 checked>All crime types<br>
	<input type=radio name=filter_crime_type value=1>Violence and sexual offenses<br>
	<input type=radio name=filter_crime_type value=2>Anti-social behaviour<br>
	<input type=radio name=filter_crime_type value=3>Vehicle crime<br>
	<input type=radio name=filter_crime_type value=4>Burglary<br>
	<input type=radio name=filter_crime_type value=5>Theft from a person<br>
	<input type=radio name=filter_crime_type value=6>Bicycle Theft<br>
	<input type=radio name=filter_crime_type value=7>Theft(other)<br>
	<input type=radio name=filter_crime_type value=8>Robbery<br>
	<input type=radio name=filter_crime_type value=9>Criminal damage and arson<br>
	<input type=radio name=filter_crime_type value=10>Drugs<br>
	<input type=radio name=filter_crime_type value=11>Shoplifting<br>
	<input type=radio name=filter_crime_type value=12>Public order<br>


	<!-- SELECTING month-->
	 <p>Select month:<br>
    <input type=radio name=filter_period value=0 checked>All months<br>
    <input type=radio name=filter_period value=1>January<br>
    <input type=radio name=filter_period value=2>February<br>
	<input type=radio name=filter_period value=2>March<br>

	
<!--
    <p>Select month:<br>
    <input type=radio name=filter_tp value=0 <?php echo ($tp==0?' checked':'') ?>>All months<br>
    <input type=radio name=filter_tp value=1 <?php echo ($tp==1?' checked':'') ?>>January<br>
    <input type=radio name=filter_tp value=2 <?php echo ($tp==2?' checked':'') ?>>February<br>
	<input type=radio name=filter_tp value=3 <?php echo ($tp==3?' checked':'') ?>>March<br>
-->

	<input type=submit value='Submit'>
	</form>  
    
</body>
</html>