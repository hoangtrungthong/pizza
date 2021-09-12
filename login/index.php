<?php
require "../drivers/ConfigDB.php";
require "../User.php";
require_once( 'Facebook/autoload.php' );
session_start();
error_reporting(0);

$user = new Customer($conn);
$users = $user->login($_POST);

$fb = new Facebook\Facebook([
  'app_id' => '385940312930181',
  'app_secret' => '404d29e903a2abf152cfe2dcf9d41c75',
  'default_graph_version' => 'v2.9',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://vzn.vn/demo/fb-callback.php', $permissions);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <?php require "../vendor/styles.php" ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="auth">
        <div class="auth-form">
            <form action="" method="post">
                <h1>Đăng Nhập Vào Hệ thống</h1>
                <div class="form-group">
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="phone" placeholder="Số điện thoại" required value="<?php echo $_POST['phone'] ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Địa chỉ email" required value="<?php echo $_POST['email']  ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required value="<?php echo $_POST['password'] ?>">
                </div>
                <!-- <div class="form-group g-recaptcha" data-sitekey="6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ"></div> -->
                <div><?php echo $message ?></div>
                <button name="submit" type="submit" class="btn btn-primary">Đăng Nhập</button>
                <p>Chưa có tài khoản? <a href="../register/index.php">Đăng Kí</a></p>
                <?php echo '<a class="btn btn-primary" href="' . $loginUrl . '">Đăng nhập bằng Facebook!</a>'; ?>
            </form>
        </div>
    </div>
</body>

</html>
