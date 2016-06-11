<?php
require_once 'db.php';
$calendar = '';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if(isset($_GET['calendar'])){
	$calendar = mysql_real_escape_string($_GET['calendar']);
}
$query="SELECT * FROM $calendar";
$result = $mysqli->query($query);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>