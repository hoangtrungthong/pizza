<header class="nav header">
    <div>
        <img src="../images/unauthorized-person.png" alt="">
        <h1>
            <?php
            session_start();
            if (!isset($_SESSION['admin'])) {
                header("location: ../../index.php");
            }
            echo $_SESSION['username'];
            ?>
        </h1>
    </div>
    <div class="nav-bar">
        <a href="#">
            <img src="../images/notification.png" title="Thông báo">
        </a>
        <a href="#">
            <img src="../images/email.png" title="Tin nhắn">
        </a>
        <a href="#">
            <img src="../images/settings.png" title="Cài đặt">
        </a>
        <a href="../logout.php">
            <img src="../images/logout.png" title="Đăng xuất">
        </a>
    </div>
</header>
