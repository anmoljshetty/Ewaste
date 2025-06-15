<?php
require 'connect.php';

// Fetch all available refurbished items
$items = $conn->query("SELECT * FROM refurbished_items WHERE status='available'");

// Handle purchase form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_item'])) {
    $item_id = (int)$_POST['item_id'];
    $buyer_name = $conn->real_escape_string($_POST['buyer_name']);
    $buyer_email = $conn->real_escape_string($_POST['buyer_email']);
    $buyer_address = $conn->real_escape_string($_POST['buyer_address']);
    
    // Insert purchase record
    $stmt = $conn->prepare("INSERT INTO purchases 
                          (item_id, buyer_name, buyer_email, buyer_address)
                          VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $item_id, $buyer_name, $buyer_email, $buyer_address);
    
    if ($stmt->execute()) {
        $purchase_id = $conn->insert_id;
        header("Location: payment.php?item_id=$item_id&purchase_id=$purchase_id");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buy Refurbished Items</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
    </style>
    <style>
        body { font-family: "Abel", sans-serif;background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216)); }
        .item-container { display: flex; flex-wrap: wrap; gap: 20px; }
        .item-card {  
            margin:5px;
            border: 1px solid #ddd; 
            padding: 15px; 
            border-radius: 12px; 
            width: 300px;
            background: #f9f9f9;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container{
            display : flex;
            justify-content :center;
        }
        h1 { 
            margin-bottom : 20px;
            display : inline;
            font-family: "Oswald", sans-serif;
            background :rgb(188, 166, 68);
            padding : 8px;
        }
        .buy-form { 
            margin-top: 15px; 
            margin-right : 12px;
            padding: 15px;
            border-top: 1px dashed #ccc;
        }
        input, textarea { 
            width: 100%; 
            padding: 8px; 
            margin-bottom: 10px; 
        }
        button { 
            font-family: "Abel", sans-serif;
            font-size : 15px;
            text-decoration : none;
            color : black;
            padding : 10px;
            margin : 15px;
            border: solid 3px rgba(0, 0, 0, 0.29);
            background : rgba(117, 233, 107, 0.81);
            border-radius : 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            cursor:pointer;
        }
        button:hover {
            background-color:rgba(96, 189, 87, 0.81);
        }
        .btn-container{
            display : flex;
            justify-content : center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Refurbished Items</h1>
    </div>
    
    <div class="item-container">
        <?php while ($item = $items->fetch_assoc()): ?>
        <div class="item-card">
            <h3><?= htmlspecialchars($item['product_name']) ?></h3>
            <p>Refurbished by: <?= htmlspecialchars($item['refurbisher_name']) ?></p>
            <p>Contact: <?= htmlspecialchars($item['refurbisher_email']) ?></p>
            <p>Price: ₹<?= number_format($item['price'], 2) ?></p>
            
            <div class="buy-form">
                <form method="POST">
                    <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                    <input type="text" name="buyer_name" placeholder="Your Name" required>
                    <input type="email" name="buyer_email" placeholder="Your Email" required>
                    <textarea name="buyer_address" placeholder="Shipping Address" required></textarea>
                    <div class="btn-container">
                        <button type="submit" name="buy_item">Proceed to Payment</button>
                    </div>
                </form>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>