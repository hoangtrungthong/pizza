<?php
require "drivers/ConfigDB.php";
require "Contact.php";
require "Order.php";

session_start();
error_reporting(0);

if (!isset($_SESSION['email'])) {
    header("location: index.php");
};
// $order = new Order($conn);
// $order->addOrder($_GET['items'], $conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <?php require "vendor/styles.php" ?>
</head>

<body>
    <header>
        <div class="header">
            <h1>
                <a class="logo" href="#">
                    <img src="images/pizza.png" alt="Logo">
                    Pizza
                </a>
            </h1>
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <div class="btn_active active">
                    <a href="index.php">home</a>
                </div>
                <div class="btn_active">
                    <a href="#order">contact</a>
                </div>
                <div class="user">
                    <a id="username"><?php echo 'hi,' . $_SESSION['username'] ?>
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="logout">
                        <a href="logout/" title="Đăng xuất">Log out</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="table-cart">
        <form action="" method="post">
            <table>
                <p><?php if (isset($_SESSION['notification'])) {
                    echo $_SESSION['notification'];
                } ?></p>
                <tr>
                    <th>Sản phẩm</th>
                    <th>hình ảnh</th>
                    <th>kích cỡ</th>
                    <th>số lượng</th>
                    <th>Số tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                if (isset($_SESSION['cart']) && isset($_SESSION['username'])) {
                    $totalPrice = 0;
                    foreach($_SESSION['cart'] as $key => $value) {
                        $subTotal = $value['quantity'] * $value['price'];
                        $totalPrice +=  $subTotal;
                ?>
                    <tr>
                        <td><?php echo $value["pizza"] ?></td>
                        <td><img src="<?php echo substr($value["product_image"], 6) ?>" alt="hình ảnh" srcset=""></td>
                        <td><?php echo $value["size"] ?></td>
                        <td><?php echo $value['quantity'] ?></td>
                        <td><?php echo $value["price"].'$' ?></td>
                        <td>
                            <a class="btn update-btn" href="cart/delete.php?items=<?php echo $key ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td colspan="6">Tổng giá: <?php echo $totalPrice.'$' ?></td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td colspan="5">Giỏ hàng trống</td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <a href="index.php" class="btn">&larr; tiếp tục mua sắm</a>
            <button type="submit" class="btn" name="submit">Thanh toán &rarr;</button>
        </form>
    </section>

    <?php require "pages/contact.php" ?>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
</body>
<script src="vendor/scripts.js"></script>

</html>
