<?php 
require_once('db.php');
global $mysqli;

$getGear = "SELECT * FROM `gear` WHERE `product_id` IS NOT NULL AND `company` IS NOT NULL AND `company_url` IS NOT NULL AND `product` IS NOT NULL AND `price` IS NOT NULL AND `active` = 1";
$data = array();
if ($result = $mysqli->query($getGear)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    /* free result set */
    $result->free();
    echo json_encode($data);
}

$mysqli->close();


?>