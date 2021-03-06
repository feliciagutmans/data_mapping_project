<!--
Student 1300 8920
INSTG033 Server Programming and Structured Data Assessment
Dr. Oliver Duke-Williams and Dr. Antonis Bikakis
Due 16/05/2018

Encoding an interactive map with data showing the location
of crimes in and around The City of London from
01 January 2018- 31 March 2018.
-->

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
  <!--<link rel="stylesheet2" href="stylesheet.css"> -->
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
  integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
  crossorigin=""></script>	<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
	<?php include("all_crimedata_mapdata.php"); ?>
	<script src="all_crimedata_maplogic.js"></script>
</head>

<body onload=initialise()>
	<h1 align=center>London Crime Map</h1>
	
	<!--Introductory paragraph and data sources.-->
	<p align=center>This is a map of the locations in which crimes were committed  
	in and around The City of London, during a three-month 
	period: from the 1st of January 2018 to the 31st of March 2018. <br><br>
	Some crimes occured in the same location as each other,
	so there are less pins than total number of crimes, however if you click on 
	the green circles, you can see see the boroughs where the crims took place!<br><br>
	Data soured from https://data.police.uk/. Marker images sourced from http://www.clker.com/.
	For the map configuration I used stylesheets and configuration code from javascrip library
	https://leafletjs.com. All of these are open-source databases. <br><br>
	Key: Red= January, Orange= February, Yellow= March</p> 
	
    <div id="mapid"></div>
	<h3>Data Selection</h3>
	
	<?php  
		echo "<form action='".$_SERVER['SCRIPT_NAME']."' method='get'>";
	?>

<!-- Options for viewing the map according to crime type-->	
	<p><strong>Select crime type:</strong></p>
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
	

	<!-- Options for filtering map data by month-->
	 <p><strong>Select month:</strong></p>
    <input type=radio name=filter_period value=0 checked>All months<br>
    <input type=radio name=filter_period value=1>January<br>
    <input type=radio name=filter_period value=2>February<br>
	<input type=radio name=filter_period value=3>March<br>

	<br>
	<!--Button for user to select their filter options-->
	<input type=submit value='Submit'>
	</form>  
    
</body>
</html>