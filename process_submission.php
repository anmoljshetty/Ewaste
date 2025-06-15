<?php
// submit
session_start();

// Include database connection
include 'connect.php';
 
// Handle Registration
if(isset($_POST['sell'])){
    // Get form data
    $ewaste_type = $_POST['ewasteType'];
    $quantity  = $_POST['quantity'];
    $seller_email  = $_POST['email'];
    $seller_address = $_POST['address'];
    
    // Insert new user with userType
    $insert = "INSERT INTO ewaste_submissions (ewaste_type, quantity, seller_email, seller_address)
                   VALUES ('$ewaste_type', '$quantity', '$seller_email', '$seller_address')";
    
    if($conn->query($insert) === TRUE){
        // Redirect to appropriate page based on userType
        header("Location: seller_success.php");
    }
    else{
        echo "Error: ".$conn->error;
    }
}

?>