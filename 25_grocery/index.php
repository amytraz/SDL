<?php
include 'db.php';
session_start();

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Grocery Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        .cart-link {
            display: block;
            text-align: center;
            margin-bottom: 30px;
            font-size: 18px;
            text-decoration: none;
            color: #2980b9;
        }

        .product {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 10px auto;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .product h4 {
            margin: 0 0 10px;
            color: #34495e;
        }

        form {
            margin-top: 10px;
        }

        input[type="submit"] {
            background: #27ae60;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background: #2ecc71;
        }
    </style>
</head>
<body>

<h2>Welcome to the Grocery Store 🛒</h2>
<a class="cart-link" href="cart.php">🛍️ View Cart</a>

<?php while($row = $result->fetch_assoc()) { ?>
    <div class="product">
        <h4><?= $row['name'] ?> - $<?= $row['price'] ?></h4>
        <form method="post" action="cart.php">
            <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
            <input type="submit" value="Add to Cart">
        </form>
    </div>
<?php } ?>

</body>
</html>
