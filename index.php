<?php
require "drivers/ConfigDB.php";
require "Contact.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/headers.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/ship.css">
    <link rel="stylesheet" href="css/responsives.css">
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
