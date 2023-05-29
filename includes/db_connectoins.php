<?php

$host = 'localhost';
$db_name = 'student';
$username = 'root';
$password = '';

try {
    $database = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
