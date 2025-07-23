<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h1 class="auth-title">Welcome Back</h1>
            <p class="auth-subtitle">Sign in to your account</p>
        </div>

        <?php
            if (isset($_COOKIE['msg'])) {
                echo '<div class="alert alert-success">' . $_COOKIE['msg'] . '</div>';
                setcookie('msg', '', time() - 3600);
            }
        ?>

        <form action="" method="POST">
            <?php 
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']); 
                }
            ?>

            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="text" 
                       class="form-input" 
                       id="username"
                       name="username" 
                       placeholder="Enter your username"
                       value="<?php echo isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : ''; ?>">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" 
                       class="form-input" 
                       id="password"
                       name="password" 
                       placeholder="Enter your password"
                       value="<?php echo isset($_COOKIE['remember_password']) ? $_COOKIE['remember_password'] : ''; ?>">
            </div>

            <div class="checkbox-group">
                <input type="checkbox" 
                       class="checkbox-input" 
                       id="remember"
                       name="remember"
                       <?php if (isset($_COOKIE['remember_username'])) echo "checked"; ?>>
                <label class="checkbox-label" for="remember">Remember me</label>
            </div>

            <button type="submit" name="btnLogin" class="btn-primary">
                Sign In
            </button>

            <div class="auth-link">
                Don't have an account? 
                <a href="index.php?controller=User&action=register">Create one here</a>
            </div>
        </form>
    </div>
</body>
</html>