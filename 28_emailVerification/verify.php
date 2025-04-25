<?php
include 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT * FROM users WHERE token='$token' AND is_verified=0";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $update = "UPDATE users SET is_verified=1 WHERE token='$token'";
        $conn->query($update);
        header("Location: verified.php");
    } else {
        echo "Invalid or expired token.";
    }
}
?>

