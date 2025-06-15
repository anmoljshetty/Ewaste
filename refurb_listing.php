<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Refurbished Item</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
    </style>
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216));
            font-family: "Abel", sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-family: "Oswald", sans-serif;
            color: #2c3e50;
            text-align: center;
        }
        .form-group {
            font-size:18px;
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        } 
        button {
            font-family: "Abel", sans-serif;
            font-weight : bold;
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #219653;
        }
        .error {
            color: red;
            margin-top: 5px;
        }
        .success {
            color: green;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>List Refurbished Item</h1>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="success">Item listed successfully!</div>
        <?php endif; ?>

        <form action="process_refurb_listing.php" method="POST">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            
            <div class="form-group">
                <label for="refurbisher_name">Your Name:</label>
                <input type="text" id="refurbisher_name" name="refurbisher_name" required>
            </div>
            
            <div class="form-group">
                <label for="refurbisher_email">Your Email:</label>
                <input type="email" id="refurbisher_email" name="refurbisher_email" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price (₹):</label>
                <input type="number" id="price" name="price" min="0" step="1" required>
            </div>
            
            <button type="submit">List Item</button>
        </form>
    </div>
</body>
</html>