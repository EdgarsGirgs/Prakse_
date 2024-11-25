<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "sql_invoicing";


$conn = new mysqli($serverName, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Savienojuma kļūda: " . $conn->connect_error);
}

$sql = "SELECT id, nosaukums, apraksts FROM faili";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Failu Saraksts</h1>";
    echo "<table border='1'>
            <tr>
            <th>ID</th>
            <th>Nosaukums</th>
            <th>Apraksts</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["nosaukums"] . "</td>
            <td>" . $row["apraksts"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nav pieejamu datu.";
}

$conn->close();
?>
