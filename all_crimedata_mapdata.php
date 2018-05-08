<!--
Student 1300 8920
INSTG033 Server Programming and Structured Data Assessment
Dr. Oliver Duke-Williams and Dr. Antonis Bikakis
Due 16/05/2018
Encoding an interactive map with data showing the location
of crimes in and around The City of London from
01 January 2018- 31 March 2018.
-->
<?php
// set up database connection, and load functions
include('db_connection.php');
include('db_functions.php');

//Creating the "crime type" criteria for the map
$query = "SELECT * from all_crimedata";

//alllowing users to click on different crime types and period
//to display. Can either choose both filters together or see them separately.

if (isset($_GET['filter_crime_type'])) {
	$ct = $_GET['filter_crime_type']; 	
}
if (isset($_GET['filter_period'])) {
	$tp = $_GET['filter_period'];
}
if ($ct>0 or $tp>0)
	$query.= " where ";

	// Defining the different types of crimes
	switch($ct) {
	case 1:
		$query .= " crime_type = 'violence_and_sexual_offences'";
		break;
	case 2:
		$query .= " crime_type = 'anti-social_behaviour'";
		break;
	case 3:
		$query .= " crime_type ='vehicle_crime'";
		break;
	case 4:
		$query .= " crime_type = 'burglary'";
		break;
	case 5:
		$query .= " crime_type = 'theft_from_the_person'";
		break;
	case 6:
		$query .= " crime_type = 'bicycle_theft'";
		break;	
	case 7:
		$query .= " crime_type = 'other_theft'";
		break;
	case 8:
		$query .= " crime_type = 'robbery'";
		break;
	case 9:
		$query .= " crime_type = 'criminal_damage_and_arson'";
		break;
	case 10:
		$query .= " crime_type = 'drugs'";
		break;
		case 11:
		$query .= " crime_type = 'shoplifting'";
		break;
	case 12:
		$query .= " crime_type = 'possession_of_weapons'";
		break;
	case 13:
		$query .= " crime_type = 'public_order'";
		break;
	default:
	
	}

 if ($tp > 0 and $ct > 0)
	 $query.= " and ";
 
//Defining the different periods/months 1=Jan, 2=Feb, 3=March 
	switch($tp) {
	case 1:
		$query .= " period = '1'";
		break;
	case 2:
		$query .= " period = '2'";
		break;
	case 3:
		$query .= " period ='3'";
		break;
	default:	
	}

//Capturing all the results as an array in PHP
$results = db_assocArrayAll($dbh,$query);

//Javascript array, for the rest of the Javascript to use
echo "<script type='text/javascript'>";
echo "var myData = ".json_encode($results,JSON_NUMERIC_CHECK);
echo "</script>";

?>