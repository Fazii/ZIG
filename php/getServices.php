<?php
require_once 'db.php';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME_USLUGI);

$queryCategories = "SELECT id, kategoriaNazwa FROM kategorie";

$categories = array();

if ($categoriesResult = $mysqli->query($queryCategories)){
    while($category = $categoriesResult->fetch_assoc()) {
        $elements = array();
        $categoryID = $category['id'];
        $queryElements = "SELECT elementy.id, elementy.elementNazwa, elementy.cena FROM elementy, kategoria_element WHERE kategoria_element.kategoriaID = $categoryID AND elementy.id = kategoria_element.elementID";

        if ($elementsResult = $mysqli->query($queryElements)){
            while($element = $elementsResult->fetch_assoc()) {
                $elements[] = $element;
            }
            $elementsJSON = json_encode($elements);
        }
        $categories[] = array('kategoriaNazwa' => $category['kategoriaNazwa'], 'id' => $categoryID, 'elementy' => $elements);
    }
}
$json = json_encode($categories);
echo $json;
?>