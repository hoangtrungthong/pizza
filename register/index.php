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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <?php require "../vendor/styles.php" ?>
</head>

<body>
    <div class="auth">
        <div class="auth-form">
            <form action="" method="post" id="customerForm">
                <h1>Đăng Kí Tài Khoản</h1>
                <div class="form-group">
                    <input class="form-control" type="text" name="fullname" placeholder="Họ Tên"  required value="<?php echo $_POST['fullname'] ?>">
                    <span class="highlight"><?php echo $users['name'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address"  required value="<?php echo $_POST['email']  ?>">
                    <span class="highlight"><?php echo $users['email'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="phone" required placeholder="Số điện thoại"  value="<?php echo $_POST['phone'] ?>">
                    <span class="highlight"><?php echo $users['phone'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="address" placeholder="Địa chỉ" required  value="<?php echo $_POST['address'] ?>">
                    <span class="highlight"><?php echo $users['address'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu"  required value="<?php echo $_POST['password'] ?>">
                    <span class="highlight"><?php echo $users['password'] ?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="rePassword" placeholder="Xác nhận lại mật khẩu"  required value="<?php echo $_POST['rePassword'] ?>">
                    <p class="highlight"><?php echo $users['password'] ?></p>
                </div>
                <div><?php echo $message; ?></div>
                <!-- <input type="checkbox" id="check" class="form-group g-recaptcha" data-sitekey="6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ" data-callback='onSubmit' data-action='submit'>
                <label for="check">Tôi không phải robot</label> -->
                <button name="submit" type="submit" class="btn btn-primary">Đăng Kí</button>
                <p>Đã có tài khoản? <a href="../login/index.php">Đăng Nhập</a></p>
            </form>
        </div>
    </div>
</body>
<!-- <script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ"></script>
<script src="captcha.js"></script> -->
</html>
