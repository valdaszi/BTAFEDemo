<!DOCTYPE html>
<html>
    <head>
        <title>PHP - MySQL - Select</title>
        <meta charset="UTF-8">
    </head>
<body>
<?php 

// Prisijungimo duomenys
$servername = 'localhost';
$dbname = 'Auto';
$username = 'Auto';
$password = 'LabaiSlaptas123';

// Prisijungiame prie duomenų bazės 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

// Suformuojame SELECT užklausą
$sql = 'SELECT id, number, distance/time*3.6 as speed, date FROM radars ORDER BY number, date DESC';

// Vykdome suformuotą užklausą duomenų bazėje
$result = $conn->query($sql);

// Tikriname ar rezultate yra bent viena eilutė
if ($result->num_rows > 0) { 
    ?>
        <table border=1>
            <tr>
                <th>id</th>
                <th>Numeris</th>
                <th>Data</th>
                <th>Greitis</th>
            </tr>
        
            <!-- einame cikle per visas rezultato eilutes ir jas išvedame --> 
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo round($row['speed']); ?></td> 
                </tr>
            <?php } ?>

        </table>
    <?php
} else {
    echo 'nėra duomenų';
}
// uždarome prisijungimą prie DB
$conn->close();

?>
</body>
</html>