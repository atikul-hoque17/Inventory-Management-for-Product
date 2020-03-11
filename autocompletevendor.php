<?php

//gethint.php page script


$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'inventory';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table

$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM vendor WHERE vendorname LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $vendorname[] = $row['vendorname'];
  
}
//return json data
echo json_encode($vendorname);


?>