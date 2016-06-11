<?php
require_once 'db.php';
$calendar = '';
$id = '';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if(isset($_GET['calendar']) && isset($_GET['ID'])){
	$calendar = mysql_real_escape_string($_GET['calendar']);
	$id = mysql_real_escape_string($_GET['ID']);
}

$query="DELETE FROM $calendar WHERE id = $id";

$response = '';

if ($mysqli->query($query)) {
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