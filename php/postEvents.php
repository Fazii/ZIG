<?php
require_once 'db.php';
$calendar = '';
$id = '';
$start = '';
$end = '';
$title = '';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if(isset($_GET['calendar']) && isset($_GET['ID']) && isset($_GET['start']) && isset($_GET['end']) && isset($_GET['title'])){
	$calendar = mysql_real_escape_string($_GET['calendar']);
	$id = mysql_real_escape_string($_GET['ID']);
	$start = mysql_real_escape_string($_GET['start']);
	$end = mysql_real_escape_string($_GET['end']);
	$title = mysql_real_escape_string($_GET['title']);
}

$query = "INSERT INTO $calendar (id, start, end, title) VALUES ($id, '$start',  '$end', '$title') ";
$query .= "ON DUPLICATE KEY UPDATE id = $id, start = '$start', end = '$end', title = '$title'";

$response = $query;

if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                $response .= $row[0];
            }
            $result->free();
        }
        /* print divider */
        if ($mysqli->more_results()) {
            $response .= "-----------------\n";
        }
    } while ($mysqli->next_result());
}

echo $response;
?>