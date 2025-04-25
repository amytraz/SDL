<?php
// Step 1: Handle form submission and set cookie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    $username = $_POST["username"];

    // Set the cookie for 7 days
    setcookie("username", $username, time() + (86400 * 7), "/");

    // Redirect to the same page to load the cookie
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        form {
            background: #fff;
            padding: 20px;
            margin: 0 auto;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"] {
            padding: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
// Step 2: Display the cookie if it's set
if (isset($_COOKIE["username"])) {
    echo "<h2>Welcome back, " . htmlspecialchars($_COOKIE["username"]) . "!</h2>";
} else {
?>
    <!-- Step 3: Form to accept username -->
    <form method="post" action="">
        <label for="username">Enter your name:</label>
        <input type="text" name="username" required>
        <br>
        <input type="submit" value="Save Name">
    </form>
<?php
}
?>

</body>
</html>

