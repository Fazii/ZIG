<?php
require_once 'db.php';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME_USLUGI);

$id = '';

if( isset($_GET['ID']) ){
	$id = mysql_real_escape_string($_GET['ID']);
}

$query="DELETE FROM elementy WHERE id = '$id'";

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