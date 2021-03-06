<?php
require "../../drivers/MysqlDB.php";
require "../../drivers/ConfigDB.php";
require "../app/ClassFile/Topping.php";

$topping = new Topping($conn);
$toppings = $topping->getAllToppings();
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
                <div class="list">
                    <h1>Danh sách topping</h1>
                    <table>
                        <tr>
                            <th>name</th>
                            <th>image</th>
                            <th>price</th>
                            <th>Tác vụ</th>
                        </tr>
                        <?php
                        if (!empty($toppings)) {
                            foreach ($toppings as $topping) {
                        ?>
                                <tr>
                                    <td><?php echo $topping["name"] ?></td>
                                    <td><img src="<?php echo $topping["image"] ?>" alt="hình ảnh" srcset=""></td>
                                    <td><?php echo number_format($topping['price'], 0, '', '.') ?></td>
                                    <td>
                                        <a class="btn update-btn" href="updateTopping.php?id=<?php echo $topping['id'] ?>">Sửa</a>
                                        <a class="btn update-btn" href="delete.php?id=<?php echo $topping['id'] ?>">Xóa</a>
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
