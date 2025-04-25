<?php
include 'db.php';
include 'functions.php';

$products = getProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-commerce</title>
    <style>
        body { font-family: Arial; background-color: #f8f8f8; margin: 20px; }
        h1 { text-align: center; }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .product {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 250px;
            padding: 15px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .add-btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .add-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Welcome to E-commerce</h1>
    <div class="products-container">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h3><?php echo $product['name']; ?></h3>
                <p><?php echo $product['description']; ?></p>
                <p><strong>₹<?php echo $product['price']; ?></strong></p>
                <a class="add-btn" href="cart.php?action=add&id=<?php echo $product['id']; ?>&quantity=1">Add to Cart</a>
            </div>
        <?php endforeach; ?>
    </div>
    <p style="text-align:center;"><a href="cart.php">🛒 Go to Cart</a></p>
</body>
</html>

