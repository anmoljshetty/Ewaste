<?php
require 'connect.php';

$item_id = (int)$_GET['item_id'] ?? 0;
$purchase_id = (int)$_GET['purchase_id'] ?? 0;

// Verify the item exists and is available
$item = $conn->query("SELECT * FROM refurbished_items 
                     WHERE id = $item_id AND status = 'available'")->fetch_assoc();

if (!$item || !$purchase_id) {
    header("Location: buyer.php?error=invalid_item");
    exit();
}

// Handle payment completion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mark payment as completed
    $conn->query("UPDATE purchases SET payment_status = 'completed' WHERE id = $purchase_id");
    // Mark item as sold
    $conn->query("UPDATE refurbished_items SET status = 'sold' WHERE id = $item_id");
    
    header("Location: confirmation.php?purchase_id=$purchase_id");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Gateway</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
    </style>
    <style>
        body { font-family: "Abel", sans-serif;background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216)); max-width: 500px; margin: 20px auto; }
        .container{
            display : flex;
            justify-content :center;
        } 
        p{font-size : 20px;}
        h2{ font-family: "Oswald", sans-serif;}
        .payment-card { background: #f9f9f9;border: 1px solid #ddd; padding: 30px; border-radius:12px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px;margin-right: 20px; }
        button {
            border: solid 3px rgba(0, 0, 0, 0.29);
            font-family: "Abel", sans-serif;
            font-size : 20px;
            background : rgba(108, 232, 96, 0.81);
            color : black;
            border-radius : 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            cursor:pointer; padding: 10px; width: 100%; }
    </style>
</head>
<body>
    <div class="payment-card">
        <div class="container">
            <h2>Complete Your Purchase</h2>
        </div>
        <p>Item: <?= htmlspecialchars($item['product_name']) ?></p>
        <p>Price: ₹<?= number_format($item['price'], 2) ?></p>
        
        <form method="POST">
            <div class="form-group">
                <label>Card Number</label>
                <input type="text" value="4111 1111 1111 1111" readonly>
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" value="12/25" readonly>
            </div>
            <div class="form-group">
                <label>CVV</label>
                <input type="text" value="123" readonly>
            </div>
            <button type="submit" >Complete Payment</button>
        </form>
    </div>
</body>
</html>