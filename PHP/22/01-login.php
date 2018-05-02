<?php

//sleep(10);

header("Content-Type: application/json; charset=UTF-8");

if ($_REQUEST['user'] == 'loginas' && $_REQUEST['pass'] == 'abc123') {
    $response = [
        success => true,
        token => 'kazkoks slaptas užkoduotas raktas'
    ];
} else {
    $response = [
        success => false,
        error => 'Neteisingas vardas arba slaptažodis'
    ];
}

echo json_encode($response);
