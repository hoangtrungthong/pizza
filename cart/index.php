<?php
require "../drivers/ConfigDB.php";
require "../Contact.php";

session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <?php require "../vendor/styles.php" ?>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/table-cart.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>

<body>
    <header>
        <div class="header">
            <h1>
                <a class="logo" href="#">
                    <img src="../images/pizza.png" alt="Logo">
                    Pizza
                </a>
            </h1>
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="../index.php">home</a>
                <a href="#products">menu</a>
                <a href="#topping">topping</a>
                <a href="#order">contact</a>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<div id="cart">
                            <a class="cart">
                                <img src="../images/grocery-cart.png" alt="" title="Giỏ hàng">
                                    cart
                            </a>
                        </div>';
                    echo '<a><img src="../images/locksmith.png" alt="" title="" id="username">' . $_SESSION['username'] . '</a>';
                    echo '<a href="logout/index.php" title="Đăng xuất">
                        <img src="../admin/images/logout.png"></img>
                        thoát
                    </a>';
                }
                ?>
            </nav>
        </div>
    </header>

    <section class="table-cart">
        <table>
            <tr>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Số tiền</th>
                <th>Thao tác</th>
            </tr>
            <tr>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td colspan="5">Giỏ hàng trống</td>
            </tr>
        </table>
    </section>

    <section class="order" id="order">
        <h2><span class="highlight">Liên hệ </span>với chúng tôi</h2>
        <div class="row">
            <form action="" method="post">
                <h3 class="highlight">Nhận tin khuyến mại :</h3><br>
                <div class="inputBox">
                    <input type="text" name="name" placeholder="Họ Tên" required>
                    <input type="tel" id="phone" name="phone" placeholder="Số điện thoại" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                </div>
                <div class="inputBox">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="address" placeholder="Địa chỉ" required>
                </div>
                <div class="inputBox">
                    <textarea placeholder="Ghi chú" name="note" id="" cols="15" rows="5"></textarea>
                </div>
                <button type="submit" class="btn" id="send" name="send">Gửi thông tin</button>
            </form>
            <div class="image map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.1375347822477!2d105.77592391440801!3d21.067168391843023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552c72eb9b5f%3A0x9c84e103e69e4c95!2zTmfDtSA0MDEgxJDGsOG7nW5nIEPhu5UgTmh14bq_LCBD4buVIE5odeG6vyAyLCBC4bqvYyBU4burIExpw6ptLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1630410484865!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
</body>

<script src="../js/script.js"></script>
<script>
    var user = document.getElementById('username');
    if (user) {
        p.setAttribute('style', 'padding: 1rem; text-align: center');
        p.innerText = "Giỏ hàng trống";
        img.src = "../images/anxiety.png";
        img.setAttribute('style', 'margin: 0 auto;');
        p.appendChild(img);
        div.appendChild(p);
        cart.appendChild(div);
    }
</script>

</html>