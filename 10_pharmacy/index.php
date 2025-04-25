<!DOCTYPE html>
<html>
<head>
  <title>Add Medicine</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Add New Medicine</h2>
  <form method="POST" action="">
    <label>Medicine Name:</label>
    <input type="text" name="name" required pattern="[A-Za-z\s]+" title="Only alphabets and spaces allowed">

    <label>Type (Tablet/Syrup):</label>
    <input type="text" name="type" required pattern="Tablet|Syrup" title="Only 'Tablet' or 'Syrup' allowed">

    <label>Price (per unit):</label>
    <input type="number" step="0.01" name="price" required min="0">

    <label>Quantity:</label>
    <input type="number" name="quantity" required min="1" title="Only whole numbers allowed">

    <label>Expiry Date:</label>
    <input type="date" name="expiry_date" required>

    <input type="submit" name="add" value="Add Medicine">
  </form>
  <br>
  <a href="inventory.php">View Inventory</a>
</div>

<?php
require 'db.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $expiry_date = $_POST['expiry_date'];

    // Server-side validation
    if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
        echo "<p style='color:red; text-align:center;'>Invalid medicine name!</p>";
    } elseif (!in_array($type, ['Tablet', 'Syrup'])) {
        echo "<p style='color:red; text-align:center;'>Type must be 'Tablet' or 'Syrup'!</p>";
    } elseif (!is_numeric($price) || $price < 0) {
        echo "<p style='color:red; text-align:center;'>Invalid price!</p>";
    } elseif (!filter_var($quantity, FILTER_VALIDATE_INT) || $quantity < 1) {
        echo "<p style='color:red; text-align:center;'>Quantity must be a positive whole number!</p>";
    } else {
        $sql = "INSERT INTO medicines (name, type, price, quantity, expiry_date)
                VALUES ('$name', '$type', '$price', '$quantity', '$expiry_date')";

        if ($conn->query($sql)) {
            echo "<p style='color:green; text-align:center;'>Medicine added successfully!</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Error: " . $conn->error . "</p>";
        }
    }
}
?>
</body>
</html>
