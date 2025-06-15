<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    
    <!-- Linking Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Linking custom CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Sign Up/Registration Container -->
    <!-- Initially hidden (display:none) because we want to show sign-in first -->
    <div class="container" id="signup" style="display: none;" >
      <h1 class="form-title">Register</h1>
      
      <!-- Registration form that submits to register.php -->
      <form method="post" action="register.php">
        <!-- First Name input field -->
        <div class="input-group">
           <i class="fas fa-user"></i> <!-- User icon -->
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
        </div>
        
        <!-- Last Name input field --> 
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
        </div>
        
        <!-- Email input field -->
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        
        <!-- Password input field -->
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        
        <!-- User Type Selection -->
        <div class="input-group tag">
            <div class="Iam">I am a :</div>
            <div class="user-type-options">
                <label>
                    <input type="radio" name="userType" value="buyer" required checked> 
                    <span>Buyer</span>
                </label>
                <label>
                    <input type="radio" name="userType" value="seller"> 
                    <span>Seller</span>
                </label>
                <label>
                    <input type="radio" name="userType" value="refurbisher"> 
                    <span>Refurbisher</span>
                </label>
            </div>
        </div>
        
        <!-- Submit button for registration -->
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      
      <!-- Divider with "or" text -->
      <p class="or">
        ----------or--------
      </p>
      
      <!-- Social media login options -->
      <div class="icons">
        <i class="fab fa-google"></i> <!-- Google icon -->
        <i class="fab fa-facebook"></i> <!-- Facebook icon -->
      </div>
      
      <!-- Link to switch to Sign In form -->
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button> <!-- Button to toggle to sign-in -->
      </div>
    </div>

    <!-- Sign In/Login Container -->
    <!-- This is visible by default (no display:none) -->
    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        
        <!-- Login form that submits to register.php -->
        <form method="post" action="register.php">
          <!-- Email input field -->
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" required>
          </div>
          
          <!-- Password input field -->
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
          </div>
          
          <!-- Password recovery link -->
          <p class="recover">
            <a href="#">Recover Password</a>
          </p>
          
          <!-- Submit button for login -->
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        
        <!-- Divider with "or" text -->
        <p class="or">
          ----------or--------
        </p>
        
        <!-- Social media login options -->
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        
        <!-- Link to switch to Sign Up form -->
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button> <!-- Button to toggle to sign-up -->
        </div>
      </div>
      
      <!-- Linking JavaScript file for interactive functionality -->
      <script src="script.js"></script>
</body>
</html>
<!-- index --> 