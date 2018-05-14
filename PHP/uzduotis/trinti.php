<?php 

// Prisijungimo duomenys
$servername = 'localhost';
$dbname = 'Auto';
$username = 'Auto';
$password = 'LabaiSlaptas123';


header('Content-Type: application/json');

// Prisijungiame prie duomenų bazės 
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_REQUEST['id'];

// // Suformuojame DELETE užklausą
// $sql = "DELETE FROM `radars` WHERE `id` = ?";  
$sql = "UPDATE `radars` SET `deleted` = NOW() WHERE `id` = ?"; 

$stmt = $conn->prepare($sql);

// Priskiriame parametrų reikšmes
$stmt->bind_param("i", $id);

// Vykdome DELETE užklausą
$stmt->execute();


echo json_encode([success => true]);