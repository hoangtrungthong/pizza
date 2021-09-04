<?php
require "../../config/mysql_db.php";
error_reporting(0);

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $rePassword = md5($_POST['rePassword']);
    $message = '';

    if ($password === $rePassword) {
        // if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        //     $secret = '6Lc8iUEcAAAAADzIiOMaZqXvn8jpom0PIekyTOHd';
        //     $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        //     $responseData   = json_decode($verifyResponse);
        //     if ($responseData->success) {
        $sql = "SELECT * FROM customers WHERE email='$email' OR phone='$phone' LIMIT 1";

        $query = mysqli_query($conn, $sql);
        $customers = mysqli_fetch_assoc($query);

        if (!$customers) {

            $sql = "INSERT INTO customers (fullname, email, phone, address, password )
                            VALUES ('$fullname', '$email', '$phone', '$address', '$password' )";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Đăng kí thành công!! Hãy đăng nhập!")</script>';
                echo '<script>window.location.href="login.php"</script>';
            }
        } else {
            if ($customers['email'] === $_POST['email']) {
                $message = 'Địa chỉ email đã được sử dụng.';
            }
            if ('0' . $customers['phone'] === $_POST['phone']) {
                $message = 'Số điện thoại đã được sử dụng.';
            }
        }
        //     }
        // }
    } else {
        $message = "Mật khẩu xác nhận không chính xác.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
    <?php require "../../vendor/styles.php" ?>
</head>

<body>
    <div class="auth">
        <div class="auth-form">
            <form action="" method="post" id="customerForm">
                <h1>Đăng Kí Tài Khoản</h1>
                <div class="form-group">
                    <input class="form-control" type="text" name="fullname" placeholder="Họ Tên" required value="<?php echo $fullname ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email  ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="phone" placeholder="Số điện thoại" required value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="address" placeholder="Địa chỉ" required value="<?php echo $address ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required value="<?php echo $_POST['password'] ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="rePassword" placeholder="Xác nhận lại mật khẩu" required value="<?php echo $_POST['rePassword'] ?>">
                </div>
                <div><?php echo $message; ?></div>
                <!-- <input type="checkbox" id="check" class="form-group g-recaptcha" data-sitekey="6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ" data-callback='onSubmit' data-action='submit'>
                <label for="check">Tôi không phải robot</label> -->
                <button name="submit" type="submit" class="btn btn-primary">Đăng Kí</button>
                <p>Đã có tài khoản? <a href="login.php">Đăng Nhập</a></p>
            </form>
        </div>
    </div>
</body>
<!-- <script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ"></script>
<script src="captcha.js"></script> -->
</html>
