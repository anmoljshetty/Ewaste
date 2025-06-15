<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Waste Submission</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
    </style>
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216));
            font-family: "Abel", sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            height : 520px;
            max-width: 600px;
            margin: 60px auto;
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
        input[type="tel"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .quantity-group {
            display: flex;
            gap: 10px;
        }
        .quantity-group input {
            flex: 2;
        }
        .quantity-group select {
            flex: 1;
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
    </style>  
</head>
<body>
    <div class="container">
        <h1>Submit Your E-Waste</h1>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>
        
        <form action="process_submission.php" method="POST" id="sell">
            <!-- E-Waste Type -->
            <div class="form-group">
                <label for="ewasteType">Type of E-Waste:</label>
                <select id="ewasteType" name="ewasteType" required>
                    <option value="" disabled selected >Select a category</option>
                    <option value="laptops">Laptops/Notebooks</option>
                    <option value="smartphones">Smartphones/Tablets</option>
                    <option value="desktops">Desktop Computers</option>
                    <option value="tv_monitors">TVs/Monitors</option>
                    <option value="printers">Printers/Scanners</option>
                    <option value="batteries">Batteries</option>
                    <option value="cables">Cables/Accessories</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Quantity -->
            <div class="form-group">
                <label for="quantity">Quantity:(pieces)</label>
                <div class="quantity-group">
                    <input type="number" id="quantity" name="quantity" min="1" step="1" required>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Collection Address:</label>
                <textarea id="address" name="address" rows="4" placeholder="Your address here...." required></textarea>
            </div>

            <!-- Submission -->
            <button type="submit" name="sell" id="sub">Submit E-Waste</button>
        </form>
    </div>
</body>
</html>