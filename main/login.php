<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="chair_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <a href="#" class="logo">
            <img src="./img/psu_logo.png" alt="PSU Logo">
            <span class="logo-text">Pangasinan State University Course Evaluation System</span>
        </a>
    </header>

    <!-- Login/Sign Up Container -->
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form>
                <h1>Sign In</h1>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button type="button" id="signIn">Sign In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <img src="img/psu_logo.png" alt="Hello Friend Logo" class="logo-image">
                    <p>Student's Sign In</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        &copy; 2024 Pangasinan State University. All Rights Reserved.
    </footer>

</body>
</html>