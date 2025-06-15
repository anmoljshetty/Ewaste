<?php
require 'connect.php';

$purchase_id = (int)$_GET['purchase_id'] ?? 0;
$purchase = $conn->query("SELECT p.*, r.product_name, r.price 
                         FROM purchases p
                         JOIN refurbished_items r ON p.item_id = r.id
                         WHERE p.id = $purchase_id")->fetch_assoc();

if (!$purchase) {
    header("Location: buyer.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
    </style>
    <style>
        body { font-family: "Abel", sans-serif;background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216)); max-width: 600px; margin: 20px auto; }
        .confirmation { background: #f9f9f9;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px; border-radius: 5px; }
        .container{
            display : flex;
            justify-content :center;
        }
        h1 { 
            font-family: "Oswald", sans-serif;
        }
        h2 { 
            font-family: "Oswald", sans-serif;
        }
        h3 { 
            font-family: "Oswald", sans-serif;
        }
    </style> 
</head>
<body>
    <div class="confirmation">
        <div class="container">
            <h1>Thank You for Your Purchase!</h1>
        </div>
        <h2><p>Order #<?= $purchase_id ?></p></h2>
        
        <h3>Item Details</h3>
        <p>Product: <?= htmlspecialchars($purchase['product_name']) ?></p>
        <p>Price: ₹<?= number_format($purchase['price'], 2) ?></p>
        
        <h3>Shipping Information</h3>
        <p>Name: <?= htmlspecialchars($purchase['buyer_name']) ?></p>
        <p>Email: <?= htmlspecialchars($purchase['buyer_email']) ?></p>
        <p>Address: <?= nl2br(htmlspecialchars($purchase['buyer_address'])) ?></p>
        
        <p style="margin-top: 20px;">
            <a href="buyer.php">Continue Shopping</a>
        </p>
    </div>
</body>
</html>