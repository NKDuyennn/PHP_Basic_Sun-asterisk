<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="public/css/register.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h1 class="auth-title">Create Account</h1>
            <p class="auth-subtitle">Join us today</p>
        </div>

        <?php 
            if (isset($_COOKIE['msg'])) {
        ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $_COOKIE['msg']; ?>
            </div>
        <?php        
            }
        ?>

        <form action="?controller=User&action=register" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="first_name">First Name</label>
                    <input type="text" 
                           class="form-input" 
                           id="first_name" 
                           placeholder="John" 
                           name="first_name" 
                           required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="last_name">Last Name</label>
                    <input type="text" 
                           class="form-input" 
                           id="last_name" 
                           placeholder="Doe" 
                           name="last_name" 
                           required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" 
                       class="form-input" 
                       id="email" 
                       placeholder="john.doe@example.com" 
                       name="email" 
                       required>
            </div>

            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="text" 
                       class="form-input" 
                       id="username" 
                       placeholder="johndoe" 
                       name="username" 
                       required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" 
                       class="form-input" 
                       id="password" 
                       placeholder="Enter your password" 
                       name="password" 
                       required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password_again">Confirm Password</label>
                <input type="password" 
                       class="form-input" 
                       id="password_again" 
                       placeholder="Confirm your password" 
                       name="password_again" 
                       required>
            </div>

            <div class="form-group">
                <label class="form-label" for="role">Role</label>
                <select class="form-select" name="role" id="role">
                    <option value="user">User</option>
                    <!-- <option value="admin">Admin</option> -->
                    <!-- <option value="staff">Staff</option> -->
                </select>
            </div>

            <button type="submit" class="btn-primary" name="btnRegister">
                Create Account
            </button>

            <div class="auth-link">
                Already have an account? 
                <a href="index.php?controller=User&action=login">Sign in here</a>
            </div>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            let password = document.querySelector('input[name="password"]').value;
            let passwordAgain = document.querySelector('input[name="password_again"]').value;
            if (password !== passwordAgain) {
                alert('Passwords do not match!');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>