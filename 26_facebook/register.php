<?php
include 'db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $raw_password = $_POST['password'];

    // Validate name contains only letters and spaces
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = "Name should contain only alphabets and spaces.";
    }
    // Validate password length
    else if (strlen($raw_password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $password = password_hash($raw_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            header("Location: login.php?msg=registered");
            exit();
        } else {
            $error = "Registration failed. Try another email.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
    <h2>Create Account</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="password" placeholder="New Password" required>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</div>
</body>
</html>
