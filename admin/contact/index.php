<?php
require "../../drivers/ConfigDB.php";
require "../../Contact.php";

$contact = new MysqlDB($conn);
$contacts = $contact->get('contact');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="shortcut icon" href="../images/shelf.png" type="image/x-icon">
    <?php require "../css/styles.php" ?>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="wrap">
        <?php require "../layout/header.php" ?>
        <section class="content">
            <?php require "../layout/sidebar.php" ?>
            <div class="box_content">
                <div class="list">
                    <h1>Danh sách những người liên hệ</h1>
                    <table>
                        <tr>
                            <th>Họ Tên</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa chỉ email</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Phản hồi</th>
                            <th>Thao tác</th>
                        </tr>
                        <form action="" method="post">
                            <?php
                            if (!empty($contacts)) {

                                foreach ($contacts as $contact) {
                            ?>
                                    <tr>
                                        <td><?php echo $contact["name"] ?></td>
                                        <td><a href="tel: <?php echo '0' . $contact["phone"] ?>">0<?php echo $contact["phone"] ?></a></td>
                                        <td><?php echo $contact["email"] ?></td>
                                        <td><?php echo $contact["address"] ?></td>
                                        <td><?php echo $contact["note"] ?></td>
                                        <td>
                                            <?php
                                            $id = $contact['id'];
                                            $data = ['checked' => "1"];
                                            $where = ['id' => "$id"];
                                            $contacts = new MysqlDB($conn);
                                            $result = $contacts->update('contact', $data, $where);
                                            if ($contact['checked'] === '1') {
                                                echo '<p>Đã phản hồi</p>';
                                            } else {
                                            ?>
                                                <a href="index.php?id=<?php echo $contact['id'] ?>" name="check">Phản hồi</a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn update-btn" href="delete.php?id=<?php echo $contact['id'] ?>">Xóa</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?> <tr>
                                    <td colspan="6">Trống ....</td>
                                </tr> <?php
                                    }
                                        ?>
                        </form>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>
<script src="script.js"></script>

</html>