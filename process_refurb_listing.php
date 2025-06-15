<?php
require 'connect.php';
// connects

// Validate and sanitize input 
$product_name = $conn->real_escape_string($_POST['product_name'] ?? '');
$refurbisher_name = $conn->real_escape_string($_POST['refurbisher_name'] ?? '');
$refurbisher_email = filter_var($_POST['refurbisher_email'] ?? '', FILTER_VALIDATE_EMAIL);
$price = filter_var($_POST['price'] ?? 0, FILTER_VALIDATE_FLOAT, [
    'options' => ['min_range' => 0]
]);

// Validate required fields
if (empty($product_name) || empty($refurbisher_name) || !$refurbisher_email || $price === false) {
    header("Location: refurb_listing.php?error=invalid_input");
    exit();
}

// Insert into database
try {
    $stmt = $conn->prepare("INSERT INTO refurbished_items 
                          (product_name, refurbisher_name, refurbisher_email, price)
                          VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $product_name, $refurbisher_name, $refurbisher_email, $price);
    
    if ($stmt->execute()) {
        header("Location: refurb_success.php");
    } else {
        throw new Exception("Database error: " . $stmt->error);
    }
} catch (Exception $e) {
    error_log("Listing error: " . $e->getMessage());
    header("Location: refurb_listing.php?error=database_error");
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
?>