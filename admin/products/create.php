<?php
require "../../drivers/ConfigDB.php";
require "../../constants/index.php";
require "../helpers/validate.php";
require "validate.php";
require "../helpers/index.php";
require "../app/ClassFile/Product.php";
error_reporting(0);

$products = new Product($conn);
$products = $products->create($_POST, $_FILES);
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
                    <h2>Thêm sản phẩm</h2>
                    <div>
                        <p>( <span class="highlight">*</span> ) Không được để trống</p>
                    </div>
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="inputBox">
                                <div>
                                    <label for="title">Tên sản phẩm <span class="highlight">*</span></label>
                                    <input type="text" name="name_product" id="title" value="<?php echo isset($_POST["name_product"]) ? $_POST["name_product"] : ''; ?>">
                                    <span class="highlight"> <?php echo $products['name_product'] ?></span>
                                </div>
                                <div>
                                    <label for="img">hình ảnh sản phẩm <span class="highlight">*</span></label>
                                    <input type="file" name="image" id="img">
                                    <img id="preview">
                                    <span class="highlight"><?php echo $products['image'] ?></span>
                                </div>
                            </div>
                            <div class="inputBox">
                                <div>
                                    <label for="size">Kích cỡ <span class="highlight">*</span></label>
                                    <input type="text" name="size" id="size" value="<?php echo isset($_POST["size"]) ? $_POST["size"] : ''; ?>">
                                    <span class="highlight"> <?php echo $products['size'] ?></span>
                                </div>
                                <div>
                                    <label for="price">Giá (VNĐ) <span class="highlight">*</span></label>
                                    <input type="number" name="price" id="price" pattern="[0-9]" min="0" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : ''; ?>">
                                    <span class="highlight"> <?php echo $products['price'] ?></span>
                                </div>
                            </div>
                            <div class="inputBox">
                                <div>
                                    <label for="description">Mô tả sản phẩm <span class="highlight">*</span></label>
                                    <textarea type="text" name="descriptions" id="description" rows="5" cols="20"><?php echo isset($_POST["descriptions"]) ? $_POST["descriptions"] : ''; ?></textarea>
                                    <span class="highlight"> <?php echo $products['descriptions'] ?></span>
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
