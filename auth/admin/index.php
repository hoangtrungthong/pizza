<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php require "css/styles.php" ?>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="wrap">
        <header class="nav">
            <div>
                <img src="images/unauthorized-person.png" alt="">
                <h1>Adminator</h1>
            </div>
            <div class="nav-bar">
                <a href="">
                    <img src="images/notification.png" title="Thông báo" alt="" srcset="">
                </a>
                <a href="">
                    <img src="images/email.png" title="Tin nhắn" alt="" srcset="">
                </a>
                <a href="">
                    <img src="images/settings.png" title="Cài đặt" alt="" srcset="">
                </a>
                <a href="">
                    <img src="images/logout.png" title="Đăng xuất" alt="" srcset="">
                </a>
            </div>
        </header>
        <section class="content">
            <div class="sidebar">
                <ul>
                    <li>
                        <a href="">
                            <img src="images/house.png" alt="" srcset="">
                            trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="images/rating.png" alt="" srcset="">
                            Quản lý khách hàng
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="images/shelf.png" alt="" srcset="">
                            Quản lý sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="images/order.png" alt="" srcset="">
                            Quản lý đơn hàng
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="images/man.png" alt="" srcset="">
                            Quản lý users
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box_content">
                <div class="total">
                    <div>
                        <h3>lượt ghé thăm</h3>
                        <div>
                            <img src="../../images/graph-bar.png" alt="">
                            <p>10%</p>
                        </div>
                    </div>
                    <div>
                        <h3>lượt xem trang</h3>
                        <div>
                            <img src="../../images/graph-bar.png" alt="">
                            <p>10%</p>
                        </div>
                    </div>
                    <div>
                        <h3>truy cập duy nhất</h3>
                        <div>
                            <img src="../../images/graph-bar.png" alt="">
                            <p>10%</p>
                        </div>
                    </div>
                    <div>
                        <h3>đánh giá</h3>
                        <div>
                            <img src="../../images/graph-bar.png" alt="">
                            <p>10%</p>
                        </div>
                    </div>
                </div>
                <div class="set">
                    <h2>Web Setting</h2>
                    <div class="">
                        <form action="">
                            <div class="inputBox">
                                <div>
                                    <label for="web-title">Tiêu đề web</label>
                                    <input type="text" name="title" id="title">
                                </div>
                                <div>
                                    <label for="web-name">Tên web</label>
                                    <input type="text" name="web-name" id="web-name">
                                    <div class="show">
                                        <input type="checkbox" name="show" id="show">
                                        <label for="show">Hiện tên website</label>
                                    </div>
                                </div>
                            </div>
                            <div class="inputBox">
                                <div>
                                    <label for="logo">web logo</label>
                                    <input type="file" name="logo" id="logo" class="favicon">
                                </div>
                                <div>
                                    <label for="favicon">web favicon</label>
                                    <input type="file" name="favicon" id="favicon" class="favicon">
                                </div>
                            </div>
                            <button class="btn" type="submit">Lưu lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
