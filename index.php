<?php
require "drivers/ConfigDB.php";
require "Models/Contact.php";
require "admin/app/ClassFile/Product.php";
require "admin/app/ClassFile/Topping.php";

session_start();
error_reporting(0);

$contact = new Contact($conn);
$contact = $contact->send($_POST);

$products = new Product($conn);
$products = $products->getAllProduct();

$toppings = new Topping($conn);
$toppings = $toppings->getAllToppings();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <?php require "vendor/styles.php" ?>
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
    
    <script src="vendor/scriptss.js"></script>
</body>
</html>
