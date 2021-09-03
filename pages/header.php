<header>
    <h1>
        <a class="logo" href="#">
            <img src="images/pizza.png" alt="Logo">
            Pizza
        </a>
    </h1>
    <div id="menu-bar" class="fas fa-bars"></div>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#products">menu</a>
        <a href="#topping">topping</a>
        <a href="#footer">contact</a>
        <a href="login.php">
            <img src="images/grocery-cart.png" alt="" title="Giỏ hàng">
            cart
        </a>
        <a href="auth/customers/login.php">
            <img src="images/locksmith.png" alt="" title="Đăng nhập">
            login
            <?php
                    echo $fullname; 
             ?>
        </a>
    </nav>
</header>
<section class="home" id="home">
    <div class="content">
        <h3>Pizza made with love</h3>
        <p>Thủ công mỹ nghệ kiểu Ý bắt đầu từ việc chuẩn bị bột bánh pizza. Khi bột của chúng tôi đã sẵn sàng, chúng tôi sẽ nhồi mở đế bánh pizza theo cách thủ công của chúng tôi và topping được đặt lên mỗi chiếc bánh pizza theo phong cách New York, nguyên liệu được nhập khẩu với chất lượng cao.</p>
        <a href="#order" class="btn">đặt món</a>
    </div>
    <div class="image">
        <img src="images/home.png" alt="Hình Ảnh">
    </div>
</section>
