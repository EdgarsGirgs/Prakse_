<?php

$host = 'localhost';
$dbname = 'sql_invoicing';
$username = 'root';
$password = '12345';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>Payment Methods</h2>";
    $stmt = $pdo->query("SELECT * FROM payment_methods");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'>";
    echo "<tr><th>Payment Method ID</th><th>Name</th></tr>";
    foreach ($data as $row) {
        echo "<tr><td>{$row['payment_method_id']}</td><td>{$row['name']}</td></tr>";
    }
    echo "</table>";

    echo "<h2>Clients</h2>";
    $stmt = $pdo->query("SELECT * FROM clients");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'>";
    echo "<tr><th>Client ID</th><th>Name</th><th>Address</th><th>City</th><th>State</th><th>Phone</th></tr>";
    foreach ($data as $row) {
        echo "<tr><td>{$row['client_id']}</td><td>{$row['name']}</td><td>{$row['address']}</td><td>{$row['city']}</td><td>{$row['state']}</td><td>{$row['phone']}</td></tr>";
    }
    echo "</table>";

    echo "<h2>Invoices</h2>";
    $stmt = $pdo->query("SELECT * FROM invoices");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'>";
    echo "<tr><th>Invoice ID</th><th>Number</th><th>Client ID</th><th>Invoice Total</th><th>Payment Total</th><th>Invoice Date</th><th>Due Date</th><th>Payment Date</th></tr>";
    foreach ($data as $row) {
        echo "<tr><td>{$row['invoice_id']}</td><td>{$row['number']}</td><td>{$row['client_id']}</td><td>{$row['invoice_total']}</td><td>{$row['payment_total']}</td><td>{$row['invoice_date']}</td><td>{$row['due_date']}</td><td>{$row['payment_date']}</td></tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
