<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Login</title>
    <link rel="stylesheet" href="/css/chair_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <a href="#" class="logo">
            <img src="main/img/psu_logo.png" alt="PSU Logo">
            <span class="logo-text">Pangasinan State University Course Evaluation System</span>
        </a>
    </header>

    <!-- Login/Sign Up Container -->
    <div class="container" id="container">
        <div class="form-container sign-up">
            
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="chair_home.php" method="POST">
                <h1>Sign In</h1>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="forgot_password.php">Forgot Your Password?</a>
                <button type="submit" id="signIn">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="main/img/psu_logo.png" alt="PSU Logo" class="logo-image">
                    <p>Enter your personal details to use all of the site's features</p>
                    <button id="login" class="toggle-btn">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                <img src="main/img/psu_logo.png" alt="PSU Logo" class="logo-image">
                    <p> Faculty Log In</p>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="script.js">
        document.getElementById('signUp').addEventListener('click', function(event) {
    var password = document.querySelector('input[name="password"]').value;
    var confirmPassword = document.querySelector('input[name="confirm_password"]').value;

    // Check if password length is less than 6
    if (password.length < 6) {
        alert('Password must be at least 6 characters.');
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        alert('Passwords do not match. Please try again.');
        event.preventDefault(); // Prevent form submission
        return;
    }
});

    </script>

    <footer class="footer">
        <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
    </footer>
    
</body>
</html>
