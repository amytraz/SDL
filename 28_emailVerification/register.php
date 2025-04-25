<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"]; // plain text password
    $token = bin2hex(random_bytes(16));

    $sql = "INSERT INTO users (email, password, token) VALUES ('$email', '$password', '$token')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Registration successful!</h3>";
        echo "<p>Click the link below to verify your email:</p>";
        echo "<a href='verify.php?token=$token'>Verify Email</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="text" name="password" required><br><br>
    <button type="submit">Register</button>
</form>

