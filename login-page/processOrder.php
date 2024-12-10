<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to create an order.");
}

$host = 'localhost';
$db = 'your_database_name';
$user = 'your_username';
$pass = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["create_order"])) {
        $user_id = $_SESSION['user_id'];
        $status = $_POST["status"];

        $sql = "INSERT INTO orders (user_id, status) VALUES (:user_id, :status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'status' => $status]);

        echo "Order successfully created!";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
