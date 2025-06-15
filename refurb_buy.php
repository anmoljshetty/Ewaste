<?php
session_start();
require 'connect.php';

// Handle claim action
if (isset($_POST['claim_submission'])) {
    $submission_id = (int)$_POST['submission_id'];
    $update = "UPDATE ewaste_submissions SET status='claimed' WHERE id=$submission_id AND status='pending'";
    if ($conn->query($update)) {
        header("Location: refurbisher.php?success=claimed");
        exit();
    } else {
        header("Location: refurbisher.php?error=claim_failed");
        exit();
    }
}

// Fetch all pending submissions
$submissions = $conn->query("SELECT * FROM ewaste_submissions WHERE status='pending'");
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Refurbisher Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
    </style>
    <style>
        body { font-family: "Abel", sans-serif; margin: 20px;background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216)); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;font-size : 20px; }
        .container{
            display : flex;
            justify-content :center;
        }
        h1 { display : inline;font-family: "Oswald", sans-serif; background :rgb(188, 166, 68);padding : 8px;}
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th{font-size:25px;}
        .claim-btn {font-family: "Abel", sans-serif; padding: 8px 12px; background: #4CAF50; color: white; border: 2px solid rgba(0, 0, 0, 0.27);border-radius : 10px; cursor: pointer; font-size:18px;}
        .claim-btn:hover { background: #45a049; }
        .success { color: green; margin-bottom: 15px; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pending E-Waste Submissions</h1>
    </div>
    
    <?php if (isset($_GET['success'])): ?>
        <div class="success">Submission successfully claimed!</div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="error">Failed to claim submission. Please try again.</div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Quantity</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $submissions->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['ewaste_type']) ?></td>
                <td><?= (int)$row['quantity'] ?> pieces</td>
                <td><?= htmlspecialchars($row['seller_email']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['seller_address'])) ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="submission_id" value="<?= $row['id'] ?>">
                        <button type="submit" name="claim_submission" class="claim-btn">Mark as Claimed</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>