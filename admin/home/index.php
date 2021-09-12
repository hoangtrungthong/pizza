<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="shortcut icon" href="images/house.png" type="image/x-icon">
    <?php require "../css/styles.php" ?>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="wrap">
        <?php require "../layout/header.php" ?>
        <section class="content">
            <?php require "../layout/sidebar.php" ?>
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
<script src="script.js"></script>
</html>
