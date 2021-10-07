<?php
require "../../drivers/ConfigDB.php";
require "../app/ClassFile/Product.php";

$products = new Product($conn);
$products = $products->getAllProduct();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="shortcut icon" href="images/rating.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/list.css">
    <link rel="stylesheet" href="../../css/order.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="wrap">
        <?php require "../layout/header.php" ?>
        <section class="content">
            <?php require "../layout/sidebar.php" ?>
            <div class="box_content">
                <div class="list">
                    <h1>Danh sách sản phẩm</h1>
                    <table>
                        <tr>
                            <th>name</th>
                            <th>image</th>
                            <th>description</th>
                            <th>size</th>
                            <th>price</th>
                            <th>Tác vụ</th>
                        </tr>
                        <?php
                        if (!empty($products)) {
                            foreach ($products as $product) {
                        ?>
                                <tr>
                                    <td><?php echo $product["name"] ?></td>
                                    <td><img src="<?php echo $product["image"] ?>" alt="hình ảnh" srcset=""></td>
                                    <td><?php echo $product["description"] ?></td>
                                    <td><?php echo $product["size"] ?></td>
                                    <td><?php echo $product["price"] ?></td>
                                    <td><a class="btn update-btn" href="updateProduct.php?id=<?php echo $product['pID'] ?>">Sửa</a>
                                        <a class="btn update-btn" href="delete.php?id=<?php echo $product['pID'] ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?> <tr>
                                <td colspan="6">Chưa có sản phẩm nào</td>
                            </tr> <?php
                                }
                                    ?>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
