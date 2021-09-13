<?php
require "../../drivers/MysqlDB.php";
require "../../drivers/ConfigDB.php";
require "../app/ClassFile/Topping.php";
require "../helpers/index.php";
require "../constants/index.php";
require "validate.php";
require "../helpers/validate.php";
error_reporting(0);

$topping = new Topping($conn);
$toppings = $topping->create($_POST, $_FILES);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="shortcut icon" href="images/shelf.png" type="image/x-icon">
    <?php require "../css/styles.php" ?>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="wrap">
        <?php require "../layout/header.php" ?>
        <section class="content">
            <?php require "../layout/sidebar.php" ?>
            <div class="box_content">
                <div class="set">
                    <h2>Thêm topping</h2>
                    <div>
                        <p>( <span class="highlight">*</span> ) Không được để trống</p>
                    </div>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="inputBox">
                                <div>
                                    <label for="title">Tên toppings <span class="highlight">*</span></label>
                                    <input type="text" name="name" id="title" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
                                    <span class="highlight"> <?php echo $toppings['name'] ?></span>
                                </div>
                                <div>
                                    <label for="price">Giá (VNĐ) <span class="highlight">*</span></label>
                                    <input type="number" name="price" id="price" pattern="[0-9]" min="0" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : ''; ?>">
                                    <span class="highlight"> <?php echo $toppings['price'] ?></span>
                                </div>
                            </div>
                            <div class="inputBox">
                                <div>
                                    <label for="img">hình ảnh <span class="highlight">*</span></label>
                                    <input type="file" name="image" id="img">
                                    <img id="preview">
                                    <span class="highlight"><?php echo $toppings['image'] ?></span>
                                </div>
                            </div>
                            <button class="btn" type="submit" name="create">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<script src="../script.js"></script>

</html>