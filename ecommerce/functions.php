<?php
function addToCart($product_id, $quantity) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM cart WHERE product_id = ?");
    $stmt->execute([$product_id]);
    $item = $stmt->fetch();

    if ($item) {
        $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + ? WHERE product_id = ?");
        $stmt->execute([$quantity, $product_id]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cart (product_id, quantity) VALUES (?, ?)");
        $stmt->execute([$product_id, $quantity]);
    }
}

function removeFromCart($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->execute([$id]);
}

function getCart() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM cart");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

