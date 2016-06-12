<?php
require_once 'db.php';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME_USLUGI);

$id = '';
$categoryID = '';
$elementName = '';
$cena = '';

if( isset($_GET['ID']) && isset($_GET['elementName']) && isset($_GET['cena']) && isset($_GET['categoryID']) ){
	$id = mysql_real_escape_string($_GET['ID']);
	$elementName = mysql_real_escape_string($_GET['elementName']);
	$cena = mysql_real_escape_string($_GET['cena']);
	$categoryID = mysql_real_escape_string($_GET['categoryID']);
}

$query = "INSERT INTO elementy (id, elementNazwa, cena ) VALUES ('$id', '$elementName', '$cena') ";
$query .= "ON DUPLICATE KEY UPDATE id = '$id', elementNazwa  = '$elementName', cena = '$cena' ";

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

$elementID = $mysqli->insert_id;

$query = "INSERT INTO kategoria_element (kategoriaID, elementID) VALUES ('$categoryID', '$elementID') ";
$query .= "ON DUPLICATE KEY UPDATE kategoriaID = '$categoryID', elementID = '$elementID' ";

$response .= '\n';
$response .= $query;

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