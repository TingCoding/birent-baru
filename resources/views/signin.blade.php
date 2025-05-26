<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
            <a href="/register">REGISTER</a>
            <button class="sign-in-btn" style="background-color: white; color: #8B0000; border: 2px solid #8B0000;">SIGN IN</button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <h2 class="form-title">Login</h2>
            <form>
                {{-- <div class="form-group">
                    <input type="text" class="form-input" placeholder="Full Name" required>
                </div> --}}
                <div class="form-group">
                    <input type="email" class="form-input" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" placeholder="Password" required>
                </div>
                <div class="signin-link">
                    Don't have an account yet? <a href="/register">Sign Up</a>
                </div>
                <button type="submit" class="form-btn regislogin">Sign In</button>
            </form>
        </div>
    </div>

    <script src="{{ 'js/navbar.js' }}"></script>
</body>
</html>