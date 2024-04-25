<?php

$host = 'localhost';
$dbname = 'inventory';
$username = 'root';
$password = '';
try {
    // Create a new PDO instance
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    session_start();

    // Register session variable
    if (!isset($_SESSION['type'])) {
        $_SESSION['type'] = '';
    }
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['user_id'] = '';
    }

    // echo "Connected successfully";
} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}

?>