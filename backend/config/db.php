<?php
$host   = 'localhost';
$db     = 'blog';
$user   = 'test';
$pass   = 'test';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected to DB";
} catch (PDOException $e) {
    die("Error to connect to DB: " . $e->getMessage());
}