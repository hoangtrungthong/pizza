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
                <a href="#products">menu</a>
            </div>
            <div class="btn_active">
                <a href="#topping">topping</a>
            </div>
            <div class="btn_active">
                <a href="#order">contact</a>
            </div>
            <?php
            if (!isset($_SESSION['email'])) {
            ?>
                <div class="btn_active">
                    <a href="register/">register</a>
                </div>
                <div class="btn_active">
                    <a href="login/"> Login </a>
                </div>
            <?php
            } else {
            ?>
                <div id="cart" class="btn_active">
                    <a href="cart/" class="cart">cart</a>
                    <div id="cart-area">
                        <?php
                        if (!isset($_SESSION['cart']) || !count($_SESSION['cart'])) {
                        ?>
                            <p>Giỏ hàng trống
                                <img id="cart_space_image" src="images/anxiety.png">
                            </p>
                        <?php
                        } else {
                        ?>
                            <p class="cart_display">Danh sạch món ăn bạn order:</p>
                            <table>
                                <?php
                                $cart = array_slice(array_reverse($_SESSION['cart']), 0, 3);
                                foreach ($cart as $key => $value) {
                                ?>
                                    <tr>
                                        <td><img src="<?php echo substr($value['product_image'], 6) ?>" alt=""></td>
                                        <td><?php echo $value['pizza'] ?></td>
                                        <td><?php echo number_format( $value["price"], 0, '', '.' ). 'đ' ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <a class="go_cart" href="cart.php">Xem tất cả &raquo;</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="user">
                    <a id="username"><?php echo 'hi,' . $_SESSION['username'] ?>
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="logout">
                        <a href="logout/" title="Đăng xuất">Log out &rarr;</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </nav>
    </div>
</header>
<section class="home" id="home">
    <div class="content">
        <h3>Pizza made with love</h3>
        <p>Thủ công mỹ nghệ kiểu Ý bắt đầu từ việc chuẩn bị bột bánh pizza. Khi bột của chúng tôi đã sẵn sàng, chúng tôi sẽ nhồi mở đế bánh pizza theo cách thủ công của chúng tôi và topping được đặt lên mỗi chiếc bánh pizza theo phong cách New York, nguyên liệu được nhập khẩu với chất lượng cao.</p>
        <a href="#products" class="btn">đặt món</a>
    </div>
    <div class="image">
        <img src="images/home.png" alt="Hình Ảnh">
    </div>
</section>