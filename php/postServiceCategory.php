<?php
require_once 'db.php';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME_USLUGI);

$id = '';
$categoryName = '';

if( isset($_GET['ID']) && isset($_GET['categoryName']) ){
	$id = mysql_real_escape_string($_GET['ID']);
	$categoryName = mysql_real_escape_string($_GET['categoryName']);
}

$query = "INSERT INTO kategorie (id, kategoriaNazwa) VALUES ($id, '$categoryName') ";
$query .= "ON DUPLICATE KEY UPDATE id = $id, kategoriaNazwa = '$categoryName' ";

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