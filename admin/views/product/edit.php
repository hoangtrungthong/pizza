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
                <div class="update">
                    <div class="set">
                        <h2>Thêm sản phẩm</h2>
                        <div class="">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="inputBox">
                                    <div>
                                        <label for="title">Tên sản phẩm:</label>
                                        <input type="text" name="nameProducts" id="title" value="<?php echo $name ?>">
                                    </div>
                                    <div>
                                        <label for="logo">hình ảnh sản phẩm:</label>
                                        <input type="file" name="image" id="logo" value="<?php echo $image ?>">
                                    </div>
                                </div>
                                <div class="inputBox">
                                    <div>
                                        <label for="size">Kích cỡ</label>
                                        <input type="text" name="size" id="size" value="<?php echo $size ?>">
                                    </div>
                                    <div>
                                        <label for="price">Giá</label>
                                        <input type="text" name="price" id="price" value="<?php echo $price ?>">
                                    </div>
                                </div>
                                <div class="inputBox">
                                    <div>
                                        <label for="description">Mô tả sản phẩm:</label>
                                        <textarea type="text" name="descriptions" id="description" rows="5" cols="20" value="<?php echo $description ?>">Sản Phẩm được </textarea>
                                    </div>
                                </div>
                                <button class="btn" type="submit" name="update">Lưu Lại</button>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>
<script src="script.js"></script>

</html>
