<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

</head>
<body>
<?php
    if (isset($_COOKIE['msg'])) {
    echo '<div class="alert alert-success">' . $_COOKIE['msg'] . '</div>';
    setcookie('msg', '', time() - 3600); // Clear cookie
}
?>
<form action ="" method="POST">
    <?php 
        if (isset($_SESSION['message'])) {
            echo '<div style="color: red">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']); 
        }
    ?>
    <table style="width: 300px; margin: 150px auto auto; ">
    <caption style="font-size: 16px; font-weight: bold; color: #000000; margin-bottom: 20px;">Login Form</caption>
    <tr>
        <td> Username </td>
        <td> <input type="text" name="username" 
                    value="<?php echo isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : ''; ?>"> </td>
    </tr>
    <tr>
        <td> Password </td>
        <td> <input type="password" name="password" 
                    value="<?php echo isset($_COOKIE['remember_password']) ? $_COOKIE['remember_password'] : ''; ?>"> </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <label style="margin-right: 10px;">
                <input type="checkbox" name="remember"
                <?php if (isset($_COOKIE['remember_username'])) echo "checked"; ?>>
                Remember me
            </label>
            <input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <div style="padding-top: 10px; font-size: 13px;">
                Don't have an account?
                <a href="index.php?controller=User&action=register" style="text-decoration: none; color: blue;">
                    Register here
                </a>
            </div>
        </td>
    </tr>
    </table>
</form>
</body>
</html>