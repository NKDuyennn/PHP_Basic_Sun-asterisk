<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Register</h3>
    <?php 
        if (isset($_COOKIE['msg'])) {
    ?>
        <div class="alert alert-danger">
            <strong>Danger!</strong> <?php echo $_COOKIE['msg']; ?>
        </div>
    <?php        
        }
     ?>
    <hr>
        <form action="?controller=User&action=register" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" id="" placeholder="First Name" name="first_name">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" id="" placeholder="Last Name" name="last_name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" placeholder="Type email" name="email">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" id="" placeholder="Type username" name="username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="" placeholder="Type password" name="password">
            </div>  
            <div class="form-group">
                <label for="">Password again</label>
                <input type="password" class="form-control" id="" placeholder="Type password again" name="password_again">
            </div>  
            <div class="form-group">
                <label for="">Role</label>
                <select class="form-control" name="role">
                    <option value="user">User</option>
                    <!-- <option value="admin">Admin</option> -->
                    <!-- <option value="staff">Staff</option> -->
                </select>
            </div>
            <div align="center">
                <button type="submit" class="btn btn-primary" name="btnRegister" >Register</button>
            </div>
        </form>
    </div>
    <div style="padding-top: 10px; font-size: 13px;" align="center">
        Had an account?
        <a href="index.php?controller=User&action=login" style="text-decoration: none; color: blue;">
            Login here
        </a>
    </div>
</body>
</html>
<!-- <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        let password = document.querySelector('input[name="password"]').value;
        let passwordAgain = document.querySelector('input[name="password_again"]').value;
        if (password !== passwordAgain) {
            alert('Passwords do not match! hehe ');
            event.preventDefault(); // Prevent form submission
        }
    });
</script> -->