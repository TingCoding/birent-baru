<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ 'css/navbar.css' }}">
    <link rel="stylesheet" href="{{ 'css/form.css' }}">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="{{ 'images/logoBirent.png' }}" alt="">
        </div>
        <div class="nav-links">
            <a href="/">HOME</a>
            <a href="/cars">CARS</a>
            <a href="#" class="active">REGISTER</a>
            <button class="sign-in-btn">SIGN IN</button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <h2 class="form-title">Register</h2>
            <form>
                <div class="form-group">
                    <input type="text" class="form-input" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-input" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" placeholder="Password" required>
                </div>
                <div class="signin-link">
                    Already have an account? <a href="/login">Sign In</a>
                </div>
                <button type="submit" class="form-btn regislogin">Sign Up</button>
            </form>
        </div>
    </div>

    <script src="{{ 'js/navbar.js' }}"></script>
</body>
</html>