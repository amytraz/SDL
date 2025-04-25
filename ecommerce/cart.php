<?php
include 'db.php';
include 'functions.php';

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    addToCart($_GET['id'], $_GET['quantity']);
}

if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    removeFromCart($_GET['id']);
}

$cartItems = getCart();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body { font-family: Arial; background-color: #f8f8f8; margin: 20px; }
        h1 { text-align: center; }
        .cart-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .cart-item {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .remove-btn {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
        }
        .remove-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Your Cart</h1>
    <div class="cart-container">
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <?php foreach ($cartItems as $item): ?>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
                $stmt->execute([$item['product_id']]);
                $product = $stmt->fetch();
                ?>
                <div class="cart-item">
                    <h3><?php echo $product['name']; ?></h3>
                    <p>Price: ₹<?php echo $product['price']; ?></p>

                    <p>Quantity: <?php echo $item['quantity']; ?></p>
                    <a class="remove-btn" href="cart.php?action=remove&id=<?php echo $item['id']; ?>">Remove</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <p style="text-align:center;"><a href="index.php">← Back to Products</a></p>
    </div>
</body>
</html>

