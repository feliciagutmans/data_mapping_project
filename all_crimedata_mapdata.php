<?php
// set up database connection, and load functions
include('db_connection.php');
include('db_functions.php');


//Creating the "crime type" criteria for the map
$query = "SELECT * from all_crimedata";

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


if (isset($_GET['filter_period'])) {
	$tp = $_GET['filter_period'];
	// Distinguishing the different months
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
if (isset($_GET['filter_period','filter_crime_type'])){
	$filter_crime_type= true;
}
if (isset($_GET['filter_crime_type' , 'filter_period'])){
	$filter_period= true;
}

*/

/*
$includeCrime_type=false;
$includePeriod=false;

if (isset($_GET['crime_type']) && $_GET['period'] == 1) {
    $includeCrime_type = true;
}

if (isset($_GET['period']) && $_GET['crime_type'] == 1) {
    $includePeriod = true;
}
*/


/*
if
$includeCrime_type=false;
$includePeriod=false;

if (isset($_GET['crime_type']) && $_GET['period'] == 1) {
    $includeCrime_type = true;
}

if (isset($_GET['period']) && $_GET['crime_type'] == 1) {
    $includePeriod = true;
}
*/



/*
if (isset($_GET['filter_tp'])) {
    $tp = $_GET['filter_tp'];
} else {
    $tp = 0;    
}

// We only need to look for certain values
switch($tp) {
case 1:
case 2:
case 3:
    $timeperiod = "period = $tp";
    break;
default:
    $tp = 0;
}

	
$query .= $timeperiod; // add the dayofweek check. This will be an empty string for 'all days'

// if we've previously added a da of week check and we're about to add a throttle,
// we'll need an 'and'
if ($tp > 0) {
    $query .= " and ";
}
$query .= $crime_type;
*/

//Capturing all the results as an array in PHP
$results = db_assocArrayAll($dbh,$query);

//Javascript array, for the rest of the Javascript to use

echo "<script type='text/javascript'>";
echo "var myData = ".json_encode($results,JSON_NUMERIC_CHECK);
echo "</script>";

?>