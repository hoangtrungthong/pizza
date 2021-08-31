<?php
    require "config/mysql_db.php";
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

            // order
            require('pages/order.php');
            ?>
        </div>

        <!-- footer -->
        <?php require "pages/footer.php" ?>
    </div>
</body>

<script src="js/script.js"></script>

</html>
