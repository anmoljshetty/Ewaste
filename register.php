<?php 
// Start session (for storing user data after login)
session_start();

// Include database connection
include 'connect.php';

// Handle Registration
if(isset($_POST['signUp'])){
    // Get form data
    $firstName = $_POST['fName'];
    $lastName  = $_POST['lName'];
    $email     = $_POST['email'];
    $password  = md5($_POST['password']); // Using md5 for demo (in production, use password_hash())
    $userType  = $_POST['userType']; // Get selected user type from radio buttons
    
    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    
    if($result->num_rows > 0){
        echo "Email Address Already Exists!";
    }
    else{
        // Insert new user with userType
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, userType)
                       VALUES ('$firstName', '$$lastName', '$email', '$password', '$userType')";
        
        if($conn->query($insertQuery) === TRUE){
            // Store user data in session after registration
            $_SESSION['email'] = $email;
            $_SESSION['userType'] = $userType;
            
            // Redirect to appropriate page based on userType
            redirectBasedOnUserType($userType);
        }
        else{
            echo "Error: ".$conn->error;
        }
    }
}

// Handle Login
if(isset($_POST['signIn'])){
    $email    = $_POST['email'];
    $password = md5($_POST['password']); // Using md5 for demo
    
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        
        // Store user data in session
        $_SESSION['email'] = $email;
        $_SESSION['userType'] = $row['userType'];
        
        // Redirect to appropriate page based on userType
        redirectBasedOnUserType($row['userType']);
    }
    else{
        echo "Not Found, Incorrect Email or Password";
    }
}
 
/**
 * Redirects user to their respective dashboard based on userType
 */
function redirectBasedOnUserType($userType) {
    switch($userType) {
        case 'buyer':
            header("Location: buyerhomepage.php");
            break;
        case 'seller':
            header("Location: sellerhomepage.php");
            break;
        case 'refurbisher':
            header("Location: refurbisher.php");
            break;
        default:
            // Fallback for unexpected values
            header("Location: index.php");
    }
    exit(); // Always exit after header redirect
}
?>