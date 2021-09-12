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
                    <div class="">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="inputBox">
                                <div>
                                    <label for="title">Tên sản phẩm <span class="highlight">*</span></label>
                                    <input type="text" name="name_product" id="title" required>
                                   <span class="highlight"> <?php echo $error['name_product'] ?></span>
                                </div>
                                <div>
                                    <label for="logo">hình ảnh sản phẩm <span class="highlight">*</span></label>
                                    <input type="file" name="image" id="logo" required>
                                    <?php echo $message ?>
                                </div>
                            </div>
                            <div class="inputBox">
                                <div>
                                    <label for="size">Kích cỡ <span class="highlight">*</span></label>
                                    <input type="text" name="size" id="size" required>
                                    <span class="highlight"> <?php echo $error['size'] ?></span>
                                </div>
                                <div>
                                    <label for="price">Giá <span class="highlight">*</span></label>
                                    <input type="text" name="price" id="price" required>
                                    <span class="highlight"> <?php echo $error['price'] ?></span>
                                </div>
                            </div>
                            <div class="inputBox">
                                <div>
                                    <label for="description">Mô tả sản phẩm <span class="highlight">*</span></label>
                                    <textarea type="text" name="descriptions" id="description" rows="5" cols="20" required></textarea>
                                    <span class="highlight"> <?php echo $error['descriptions'] ?></span>
                                </div>
                            </div>
                            <div>
                                <p>( <span class="highlight">*</span> ) Là những trường bắt buộc</p>
                            </div>
                            <button class="btn" type="submit" name="create">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script src="script.js"></script>

</html>
