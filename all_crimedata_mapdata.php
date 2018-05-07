<?php
// set up database connection, and load functions
include('db_connection.php');
include('db_functions.php');


//Creating the "crime type" criteria for the map
$query = "SELECT * from all_crimedata";

//alllowing users to click on different crime types to display on map
if (isset($_GET['filter_crime_type'])) {
	$ct = $_GET['filter_crime_type']; 	
	// Defining the different types of crimes
	switch($ct) {
	case 1:
		$query .= " where crime_type = 'violence_and_sexual_offences'";
		break;
	case 2:
		$query .= " where crime_type = 'anti-social_behaviour'";
		break;
	case 3:
		$query .= " where crime_type ='vehicle_crime'";
		break;
	case 4:
		$query .= " where crime_type = 'burglary'";
		break;
	case 5:
		$query .= " where crime_type = 'theft_from_the_person'";
		break;
	case 6:
		$query .= " where crime_type = 'bicycle_theft'";
		break;	
		case 7:
		$query .= " where crime_type = 'other_theft'";
		break;
	case 8:
		$query .= " where crime_type = 'robbery'";
		break;
	case 9:
		$query .= " where crime_type = 'criminal_damage_and_arson'";
		break;
	case 10:
		$query .= " where crime_type = 'drugs'";
		break;
		case 11:
		$query .= " where crime_type = 'shoplifting'";
		break;
	case 12:
		$query .= " where crime_type = 'possession_of_weapons'";
		break;
	case 13:
		$query .= " where crime_type = 'public_order'";
		break;
	default:
	
	}
}

//adding a filter for the different periods/months
if (isset($_GET['filter_period'])) {
	$tp = $_GET['filter_period'];
	// Distinguishing the different months. 1=Jan, 2=Feb, 3=March
	switch($tp) {
	case 1:
		$query .= " where period = '1'";
		break;
	case 2:
		$query .= " where period = '2'";
		break;
	case 3:
		$query .= " where period ='3'";
		break;
	default:	
	}
}	
/*
// ! NOT WORKING CURRENTLY. Must figure out how to joint two results.
$query .= $period;
	if ($tp > 0) {
		$query .= "and";	
	}	
$query .=$crime_type;
*/

//Capturing all the results as an array in PHP
$results = db_assocArrayAll($dbh,$query);

//Javascript array, for the rest of the Javascript to use

echo "<script type='text/javascript'>";
echo "var myData = ".json_encode($results,JSON_NUMERIC_CHECK);
echo "</script>";

?>