<?php
include 'db.php';
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $_SESSION['cart'][$product_id] = ($_SESSION['cart'][$product_id] ?? 0) + 1;
}

echo "<h2>Your Cart</h2><a href='index.php'>⬅️ Back</a><hr>";

$total = 0;
foreach ($_SESSION['cart'] as $product_id => $qty) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($product = $result->fetch_assoc()) {
        echo "<p>{$product['name']} (x$qty) - $" . ($product['price'] * $qty) . "</p>";
        $total += $product['price'] * $qty;
    } else {
        echo "<p>Product with ID $product_id not found.</p>";
    }
}

echo "<hr><h4>Total: $$total</h4>";
echo "<a href='checkout.php'>Proceed to Checkout</a>";
?>
