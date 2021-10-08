<?php
require "../drivers/ConfigDB.php";
require "../User.php";
error_reporting(0);

$user = new Customer($conn);
$users = $user->register($_POST);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/logins.css">
    <link rel="stylesheet" href="css/responsivee.css">
</head>

<body>
    <div class="auth">
        <div class="auth-form">
            <form action="" method="post" id="customerForm">
                <h1>Đăng Kí Tài Khoản</h1>
                <div class="form-group">
                    <input class="form-control" type="text" name="fullname" placeholder="Full Name"  required value="<?php echo $_POST['fullname'] ?>">
                    <span class="highlight"><?php echo $users['name'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address"  required value="<?php echo $_POST['email']  ?>">
                    <span class="highlight"><?php echo $users['email'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="phone" required placeholder="Phone Number"  value="<?php echo $_POST['phone'] ?>">
                    <span class="highlight"><?php echo $users['phone'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="address" placeholder="Address" required  value="<?php echo $_POST['address'] ?>">
                    <span class="highlight"><?php echo $users['address'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password"  required value="<?php echo $_POST['password'] ?>">
                    <span class="highlight"><?php echo $users['password'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="rePassword" placeholder="Confirm Password"  required value="<?php echo $_POST['rePassword'] ?>">
                    <p class="highlight"><?php echo $users['password'] ?></p>
                </div>
                <div><?php echo $message; ?></div>
                <!-- <input type="checkbox" id="check" class="form-group g-recaptcha" data-sitekey="6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ" data-callback='onSubmit' data-action='submit'>
                <label for="check">Tôi không phải robot</label> -->
                <button name="submit" type="submit" class="btn btn-primary">Register</button>
                <p>You have account? <a href="../login/index.php">Login</a></p>
            </form>
        </div>
    </div>
</body>
<!-- <script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ"></script>
<script src="captcha.js"></script> -->
</html>
