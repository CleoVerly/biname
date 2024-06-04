<?php
// Koneksi ke database
$dbHost = 'localhost';
$dbName = 'uts';
$dbUser = 'root';
$dbPass = '';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}