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
$query = $db->query("SELECT * FROM items WHERE productcode LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $productcode[] = $row['productcode'];
    $productname[] = $row['name'];
    $productid[] = $row['id'];
}
//return json data
echo json_encode($productcode);


?>