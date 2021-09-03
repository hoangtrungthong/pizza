<?php
require "config/mysql_db.php";
session_start();

// if (!isset($fullname)) {
//     header("location: auth/customers/login.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <?php require 'vendor/styles.php' ?>
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <?php require('pages/header.php') ?>
        <div>
            <?php
            // list
            require('pages/list.php');

            // topping
            require('pages/topping.php');

            // ship banner
            require('pages/ship.php');

            // contact
            require('pages/contact.php');
            ?>
        </div>
    </div>
    <div class="loader">
        <img src="images/loader.gif" alt="" srcset="">
    </div>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
</body>

<script src="js/script.js"></script>

</html>
