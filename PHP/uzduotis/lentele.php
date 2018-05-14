<?php
// error_reporting(0);
// @ini_set('display_errors', 0);

// Prisijungimo duomenys
$servername = 'localhost';
$dbname = 'Auto';
$username = 'Auto';
$password = 'LabaiSlaptas123';

$skip = $_REQUEST['skip'];
$page = $_REQUEST['page'];
if (!$skip) $skip = 0;
if (!$page) $page = 10;

// Prisijungiame prie duomenų bazės 
$conn = new mysqli($servername, $username, $password, $dbname);

header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode([
        success => false,
        error => $conn->connect_error
        ]);
    exit;
}

// Suformuojame SELECT užklausą
$sql = "SELECT * FROM radars WHERE deleted IS NULL LIMIT $page OFFSET $skip";

// Vykdome suformuotą užklausą duomenų bazėje
$result = $conn->query($sql); 

$autos = [];

// Tikriname ar rezultate yra bent viena eilutė
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
        $autos[] = $row;
    }
}

echo json_encode([
    'success' => true,
    'data' => $autos
]);
