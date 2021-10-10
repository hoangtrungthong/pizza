<?php
require "../drivers/ConfigDB.php";
require "../Models/User.php";
require_once('Facebook/autoload.php');
session_start();
error_reporting(0);

$user = new User($conn);
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
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>

<body>
    <div class="auth">
        <div class="auth-form">
            <form action="" method="post">
                <h1>Login to the account</h1>
                <div class="form-group">
                    <input class="form-control" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="phone" placeholder="Phone Number" required value="<?php echo $_POST['phone'] ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $_POST['email']  ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required value="<?php echo $_POST['password'] ?>">
                </div>
                <!-- <div class="form-group g-recaptcha" data-sitekey="6Lc8iUEcAAAAAELLOaLi8G9qUdWWwf2hCcwg4JwQ"></div> -->
                <div><?php echo $message ?></div>
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
                <p>Don't have account? <a href="../register/">Register</a></p>
                <p><a href="../reset_password/">Forgot password</a></p>
                <?php echo '<a class="btn btn-primary" href="' . $loginUrl . '">Login with Facebook!</a>'; ?>
            </form>
        </div>
    </div>
</body>
    <script>
        // login fb
        window.fbAsyncInit = function() {
            FB.init({
                appId: 385940312930181,
                cookie: true,
                xfbml: true,
                version: 'v11.0'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</html>