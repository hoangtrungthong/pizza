<?php
require "../../drivers/ConfigDB.php";
require "../../constants/index.php";
require "../helpers/validate.php";
require "validate.php";
require "../helpers/index.php";
require "../app/ClassFile/Product.php";
error_reporting(0);

$products = new Product($conn);
$product = $products->getDetailProduct(md5($_GET['id']));
$productUp = $products->update($_POST, $_FILES, $_SERVER['REQUEST_METHOD']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php require "../vendor/styles.php" ?>
</head>

<body>
    <div class="wrap">
        <?php require "../layout/header.php" ?>
        <section class="content">
            <?php require "../layout/sidebar.php" ?>
            <div class="box_content">
                <div class="update">
                    <div class="set">
                        <h2>Thêm sản phẩm</h2>
                        <div class="">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="inputBox">
                                    <div>
                                        <label for="title">Tên sản phẩm:</label>
                                        <input type="text" name="nameProducts" id="title" value="<?php echo $product['name']  ?>">
                                        <span class="highlight"><?php echo $productUp['name_product']  ?></span>
                                    </div>
                                    <div>
                                        <label for="logo">hình ảnh sản phẩm:</label>
                                        <input type="file" name="image" id="img" value="<?php echo $product['image'] ?>">
                                        <img id="preview" src=<?php echo $product['image']  ?>>
                                        <span class="highlight"><?php echo $productUp['image']  ?></span>
                                    </div>
                                </div>
                                <div class="inputBox">
                                    <div>
                                        <label for="size">Kích cỡ</label>
                                        <input type="text" name="size" id="size" value="<?php echo $product['size'] ?>">
                                        <span class="highlight"><?php echo $productUp['size']  ?></span>
                                    </div>
                                    <div>
                                        <label for="price">Giá</label>
                                        <input type="number" name="price" id="price" value="<?php echo number_format($product['price'], 0, '.', '') ?>">
                                        <span class="highlight"><?php echo $productUp['price']  ?></span>
                                    </div>
                                </div>
                                <div class="inputBox">
                                    <div>
                                        <label for="description">Mô tả sản phẩm:</label>
                                        <textarea type="text" name="descriptions" id="description" rows="5" cols="20"><?php echo $product['description'] ?></textarea>
                                        <span class="highlight"><?php echo $productUp['descriptions']  ?></span>
                                    </div>
                                </div>
                                <button class="btn" type="submit" name="update">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>
<script src="../vendor/scripts.js"></script>

</html>
