<?php
require "drivers/ConfigDB.php";
require "Models/Contact.php";
require "Models/Order.php";

session_start();
error_reporting(0);

if (!isset($_SESSION['email'])) {
    header("location: index.php");
};

$id = isset($_GET['items']) ? md5($_GET['items']) : '';

$products = new Product($conn);
$products = $products->getDetailProduct($_GET['items']);

if ($products) {
    if (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
            // if (isset($_POST['minus'])) {   
            //     $_SESSION['cart'][$id]['quantity']--; 
            //     if ($_SESSION['cart'][$id]['quantity'] === 0) {
            //         unset($_SESSION['cart'][$id]);
            //     }    
            // }
            $_SESSION['notification'] = "<script>alert('Sản phẩm đã được cập nhật trong giỏ hàng!')</script>";
        } else {
            $_SESSION['cart'][$id] = [
                'product_id' => $products['id'],
                'pizza' => $products['name'],
                'product_image' => $products['image'],
                'size' => $products['size'],
                "quantity" => 1,
                "price" => $products['price']
            ];
            $_SESSION['notification'] = "<script>alert('Sản phẩm đã được cập nhật trong giỏ hàng!')</script>";
        }
    } else {
        $_SESSION['cart'][$id] = [
            'product_id' => $products['id'],
            'pizza' => $products['name'],
            'product_image' => $products['image'],
            'size' => $products['size'],
            "quantity" => 1,
            "price" => $products['price']
        ];
        $_SESSION['notification'] = "<script>alert('Sản phẩm đã được thêm vào giỏ hàng!')</script>";
    }
} else {
    $_SESSION['notification'] = "<script>alert('Sản phẩm không tồn tại!')</script>";
}
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
                <p><?php //if (isset($_SESSION['notification'])) {
                    //  echo $_SESSION['notification'];
                    //} 
                    ?></p>
                <tr>
                    <th>Sản phẩm</th>
                    <th>hình ảnh</th>
                    <th>kích cỡ</th>
                    <th>số lượng</th>
                    <th>Số tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                if (isset($_SESSION['cart']) && isset($_SESSION['username']) && count($_SESSION['cart']) > 0) {
                    $totalPrice = 0; 
                    
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $subTotal = $value['quantity'] * $value['price'];
                        $totalPrice +=  $subTotal;
                ?>
                    <tr>
                        <td><?php echo $value["pizza"] ?></td>
                        <td><img src="<?php echo substr($value["product_image"], 6) ?>" alt="hình ảnh" srcset=""></td>
                        <td><?php echo $value["size"] ?></td>
                        <td>
                            <div class="buttons_added">
                                <button name="minus" onclick="minus()" class="minus is-form">&#45;</button>
                                <input name="quantity" min="0" aria-label="quantity" class="input-qty" type="number" value="<?php echo $value['quantity'] ?>">
                                <button name="plus" onclick="plus()" class="plus is-form">&#43;</button>
                            </div>
                        </td>
                        <td><?php echo number_format( $value["price"], 0, '', '.' ). 'đ' ?></td>
                        <td>
                            <a class="btn update-btn" href="cart/delete.php?items=<?php echo $key ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td colspan="6">Tổng giá: <?php echo number_format( $totalPrice, 0, '', '.' ).'đ'  ?></td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td colspan="6">Giỏ hàng trống</td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <?php
            if (count($_SESSION['cart']) > 0) {
            ?>
                <a href="index.php" class="btn">&laquo; tiếp tục mua sắm</a>
                <button type="submit" class="btn" name="submit">Thanh toán &raquo;</button>
            <?php
            } else {
            ?>
                <a href="index.php" class="btn">&laquo; Mua pizza</a>
            <?php
            }
            ?>
        </form>
    </section>

    <?php require "pages/contact.php" ?>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
</body>
<script src="vendor/scriptss.js"></script>

</html>