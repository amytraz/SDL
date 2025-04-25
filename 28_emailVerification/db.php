<?php
$conn = new mysqli("localhost", "root", "", "email_verify_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

