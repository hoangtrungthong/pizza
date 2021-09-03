<?php
require "../../config/mysql_db.php";
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM customers WHERE email = '$email' AND phone = '$phone' LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);

    if ($row == 1) {
        $_SESSION['fullname'] = $fullname;
        echo '<script>window.location.href="../../index.php"</script>';
    } else {
        $message = 'Thông tin tài khoản hoặc mật khẩu không chính xác.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
    <?php require "../../vendor/styles.php" ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="auth">
        <div class="auth-form">
            <form action="" method="post">
                <h1>Đăng Nhập Vào Hệ thống</h1>
                <div class="form-group">
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="phone" placeholder="Số điện thoại" required value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Địa chỉ email" required value="<?php echo $email  ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required value="<?php echo $_POST['password'] ?>">
                </div>
                <!-- <div class="form-group g-recaptcha" data-sitekey="6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ"></div> -->
                <div><?php echo $message ?></div>
                <button name="submit" type="submit" class="btn btn-primary">Đăng Nhập</button>
                <p>Bạn chưa có tài khoản? <a href="register.php">Đăng Kí</a></p>
            </form>
        </div>
    </div>
</body>

</html>